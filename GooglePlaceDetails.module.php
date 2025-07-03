<?php namespace ProcessWire;

/**
 * Gooogle Place Details Module
 *
 * This module can be used to display Google place details like reviews and other information in the frontend of a website.
 *
 * @author Stefan Thumann, 27.12.2022
 * @license https://processwire.com/about/license/mit/
 *
 * ProcessWire 2.x & 3.x, Copyright 2020 by Ryan Cramer
 * https://processwire.com
 * https://processwire.com/about/license/mit/
 *
 **/

class GooglePlaceDetails extends WireData implements Module, ConfigurableModule {

    public static function getModuleInfo() {
        return [
            'title' => 'Google Place Details',
            'summary' => 'Display Google place details like reviews and other information.',
            'author' => 'Stefan Müller',
            'version' => '1.0.1',
            'icon' => 'google'
        ];
    }

    static protected $defaults = array(
        'apiKey' => '',
        'placeId' => '',
        'dataFields' => 'name,reviews',
        'previewDetails' => '',
        'detailsData' => ''
    );

    public function __construct() {
        // populate defaults, which will get replaced with actual
        // configured values before the init/ready methods are called
        $this->setArray(self::$defaults);
    }

    public function getModuleConfigInputfields(array $data) {
        $inputfields = new InputfieldWrapper();
        $data = array_merge(self::$defaults, $data);

        $f = wire('modules')->get('InputfieldMarkup');
        $f->attr('name', 'infoData');
        $f->label = 'Before you begin';
        $f->icon = 'info';
        $f->attr('value', 'Before you start using the Google Maps API you need an API key and a project with a billing account.');
        $f->notes = 'Use Googles quick start widget here: [https://developers.google.com/maps/third-party-platforms/quick-start-widget-users](https://developers.google.com/maps/third-party-platforms/quick-start-widget-users)';
        $inputfields->add($f);

        // API Key Inputfield
        $f = wire('modules')->get('InputfieldText');
        $f->attr('name', 'apiKey');
        $f->label = 'API Key';
        $f->attr('value', $data['apiKey']);
        $f->columnWidth = 50;
        $f->notes = 'The API key is a unique identifier that authenticates requests associated with your project for usage and billing purposes: [https://developers.google.com/maps/documentation/javascript/get-api-key](https://developers.google.com/maps/documentation/javascript/get-api-key)';
        $f->required = true;
        $inputfields->add($f);

        // Place ID Inputfield
        $f = wire('modules')->get('InputfieldText');
        $f->attr('name', 'placeId');
        $f->label = 'Place ID';
        $f->attr('value', $data['placeId']);
        $f->columnWidth = 50;
        $f->notes = 'Use the place ID finder to search for a place and get its ID: [https://developers.google.com/maps/documentation/places/web-service/place-id](https://developers.google.com/maps/documentation/places/web-service/place-id)';
        $f->required = true;
        $inputfields->add($f);

        // Fields Parameter Inputfield
        $f = wire('modules')->get('InputfieldText');
        $f->attr('name', 'dataFields');
        $f->label = 'Fields to include in request';
        $f->attr('value', $data['dataFields']);
        $f->description = 'Specify a comma-separated list of place data types to return. Leave empty to load all default fields.';
        $f->notes = 'For an overview of the available fields see: [https://developers.google.com/maps/documentation/places/web-service/details](https://developers.google.com/maps/documentation/places/web-service/details)';
        $inputfields->add($f);

        // Fetch Place Details Checkbox
        $f = wire('modules')->get('InputfieldCheckbox');
        $f->attr('name', 'previewDetails');
        $f->label = 'Preview Place Details';
        $f->description = 'If checked the place details can be previewed for debugging/development purpose after submit. This preview data will not be saved and is lost after leaving this page.';
       $f->attr('value', 1);
        $f->icon = 'heartbeat';
        $inputfields->add($f);

        if($this->session->previewDetails) {
            $this->fetchData('liveData');
        }

        // Markup Field for Preview Data Array
        $f = wire('modules')->get('InputfieldMarkup');
        $f->attr('name', 'previewData');
        $f->label = 'Preview Data';
        $f->icon = 'filter';
        $f->notes = 'Note that is is not allowed to store Google Maps content outside their services. [https://cloud.google.com/maps-platform/terms](https://cloud.google.com/maps-platform/terms) ';
        if($this->session->previewDetails) {
            $f->attr('value', $this->previewData());
        }
        $inputfields->add($f);

        if(wire('input')->post->previewDetails) {
            // if checkbox was checked, set session data
            $session = wire('session');
            $session->set('previewDetails', 1);
        }

        return $inputfields;
    }

    /**
     * This function previews the revieved data in a markup field on the module page
     */
    private function previewData() {
        // remove session data
        $session = wire('session');
        $session->remove('previewDetails');

        $detailsData = $this->detailsData;

        if (!empty($detailsData)) {
            // When there is data, show it
            // hier config
            $outputTemplate = "<pre style=\"overflow:scroll !important; margin:15px auto; padding:10px; background-color:#ffffdd; color:#555; border:1px solid #AAA; font-family:'Hack', 'Source Code Pro', 'Lucida Console', 'Courier', monospace; font-size:12px; line-height:15px;\">".print_r(json_decode($detailsData,true), true)."</pre>";
        }
        else {
            $outputTemplate = "<pre style=\"overflow:scroll !important; margin:15px auto; padding:10px; background-color:#ffffdd; color:#555; border:1px solid #AAA; font-family:'Hack', 'Source Code Pro', 'Lucida Console', 'Courier', monospace; font-size:12px; line-height:15px;\">No data received yet.</pre>";
        }

        return $outputTemplate;
    }

    /**
     * This function recieves the place data over the google api via a http request and saves it for later use
     * @return array|string
     */
    private function fetchData() {

        // Get Values
        $apiKey = $this->apiKey;
        $placeId = $this->placeId;
        $dataFields = $this->dataFields;

        $apiUrl = "https://places.googleapis.com/v1/places/$placeId?fields=$dataFields&key=$apiKey";
        $http = new WireHttp();
        $responseJson = $http->get($apiUrl);

        if($responseJson !== false) {

            // Description:
            // The Response is in JSON Format.
            // To return just the result data, we have to decode the JSON into a php array, select the result object and return it

            // Turn JSON into php array
            $responseArray = json_decode($responseJson, true);

            // For preview purpose get only the result data and encode it back to JSON
            $this->detailsData = $responseJson;

            // return response array to frontend
            return $responseArray;

        } else {
            echo "HTTP request failed: " . $http->getError();
        }

    }

    /**
     * This function recieves the place data over the google api via a http request and returns it in real time
     * @return array
     */
    public function getPlaceDetails() {

        return ($this->fetchData());

    }

    public function getUIKitMarkupExample() {

        $responseArray = $this->fetchData();

        // return only the result array to the frontend and include it in a sample markup
        $result = $this->wire('files')->render('../modules/GooglePlaceDetails/reviews-markup',['details' => $responseArray]);

        return $result;
    }

}