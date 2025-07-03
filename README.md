Google Place Details for ProcessWire
====================================

![Bildschirmfoto 2023-01-03 um 12 19 44](https://user-images.githubusercontent.com/121567701/210347860-fbc70664-c231-4c44-b2f5-938b767e07e2.png)

# What it does

Google Place Details offers the possibility to send requests to the Google Maps API to receive information
about a certain place. A typical use case would be to display the reviews of a place on your website.
But you can receive any other information that the API offers.


# Before you start

You need three things:

1. A Google API Key
2. The Place ID
3. A project with a billing account activated

You can set up all of those by using Googles quick start widget here:

https://developers.google.com/maps/third-party-platforms/quick-start-widget-users


# How to install

1. Copy this directory to /site/modules

2. In your admin, go to Modules > Refresh, then Modules > New

3. Click the "Install" button next to the Google Place Details module

4. Fill out the API Key and Place ID fields in the module settings and you are ready to go.


# Module settings and field descriptions

### API Key

This field is required and must contain your generated Google API key.

### Place ID

This field is required. You can put the ID of any place into this field.

### Fields to include in request

Specify a comma-separated list of place data types to return. Leave empty to load all default fields.
For an overview of the available fields see: https://developers.google.com/maps/documentation/places/web-service/details

### Review Sorting

Chose your sorting criteria. "Most relevant" is used by default.

### Preview Place Details

If checked the place details can be previewed for debugging/development purpose on module page submit.


# Usage example

1. Load the module in a page context:
```php
$module = $modules->get('GooglePlaceDetails');
```

2. Call a function to load data
```php
$module->getPlaceDetails();
```

This function fetches the data in realtime, on every page request and returns a php array containing the full response from the
Google server.

See the frontend example at the end of this document to see how to extract data from the array in a working example.


# Place details answer example

The place details answer will be in JSON format and looks like this (depending of the fields you included in your request)
```json
{
  "rating": 4.6,
  "userRatingCount": 1531,
  "displayName": {
    "text": "Google San Francisco - 345 Spear St",
    "languageCode": "en"
  },
  "reviews": [
    {
      "name": "places/ChIJ32vwFWSAhYAR8wx7vbWoSPA/reviews/ChZDSUhNMG9nS0VJQ0FnSURmdVkyc1pBEAE",
      "relativePublishTimeDescription": "5 months ago",
      "rating": 5,
      "text": {
        "text": "They had only 2 signs outside on opposite sides of the building. Low profile. Easy to miss. There is a view of the San Francisco bay bridge from here.",
        "languageCode": "en"
      },
      "originalText": {
        "text": "They had only 2 signs outside on opposite sides of the building. Low profile. Easy to miss. There is a view of the San Francisco bay bridge from here.",
        "languageCode": "en"
      },
      "authorAttribution": {
        "displayName": "Prawnsalad1991",
        "uri": "https://www.google.com/maps/contrib/103203190516039640744/reviews",
        "photoUri": "https://lh3.googleusercontent.com/a/ACg8ocKjrrzITw62j4jGNdoauEWT-xiZMqy8wXsRNDkcSv0KXx7ZZg=s128-c0x00000000-cc-rp-mo-ba5"
      },
      "publishTime": "2025-01-08T08:22:09.598435Z",
      "flagContentUri": "https://www.google.com/local/review/rap/report?postId=ChZDSUhNMG9nS0VJQ0FnSURmdVkyc1pBEAE&d=17924085&t=1",
      "googleMapsUri": "https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChZDSUhNMG9nS0VJQ0FnSURmdVkyc1pBEAE!2m1!1s0x8085806415f06bdf:0xf048a8b5bd7b0cf3"
    },
    {
      "name": "places/ChIJ32vwFWSAhYAR8wx7vbWoSPA/reviews/ChdDSUhNMG9nS0VQS0U3Ylh5bnM2d2p3RRAB",
      "relativePublishTimeDescription": "a month ago",
      "rating": 2,
      "text": {
        "text": "Here is proof for eveyone of you, first every bounty, no payments, but yal are paying Bug Crowd. Now as a Business owner, I dont have time to waste with this. You guys sent them my money, unathorized. Figure this out, or my attorney will",
        "languageCode": "en"
      },
      "originalText": {
        "text": "Here is proof for eveyone of you, first every bounty, no payments, but yal are paying Bug Crowd. Now as a Business owner, I dont have time to waste with this. You guys sent them my money, unathorized. Figure this out, or my attorney will",
        "languageCode": "en"
      },
      "authorAttribution": {
        "displayName": "Travis Bates (Daily Investors)",
        "uri": "https://www.google.com/maps/contrib/113511267458641007523/reviews",
        "photoUri": "https://lh3.googleusercontent.com/a/ACg8ocJrlHJKwZa_eiEsmuO7lZLAPTaLFO2PLTE8nv1yVV-Z9PITXZI=s128-c0x00000000-cc-rp-mo-ba4"
      },
      "publishTime": "2025-05-26T09:34:10.525478Z",
      "flagContentUri": "https://www.google.com/local/review/rap/report?postId=ChdDSUhNMG9nS0VQS0U3Ylh5bnM2d2p3RRAB&d=17924085&t=1",
      "googleMapsUri": "https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChdDSUhNMG9nS0VQS0U3Ylh5bnM2d2p3RRAB!2m1!1s0x8085806415f06bdf:0xf048a8b5bd7b0cf3"
    },
    {
      "name": "places/ChIJ32vwFWSAhYAR8wx7vbWoSPA/reviews/ChZDSUhNMG9nS0VJQ0FnSURaaThfRFlREAE",
      "relativePublishTimeDescription": "10 months ago",
      "rating": 5,
      "text": {
        "text": "The original Google San Francisco building, with two (Google-internal) cafes and coffee shops - the third floor one is also a tea shop. There’s a Music microkitchen with a stage and a piano, there are multiple balconies with views of the Bay Bridge. Lastly, there’s a secret Broom Closet up on the 7th floor.\n\nIt’s a lovely office.",
        "languageCode": "en"
      },
      "originalText": {
        "text": "The original Google San Francisco building, with two (Google-internal) cafes and coffee shops - the third floor one is also a tea shop. There’s a Music microkitchen with a stage and a piano, there are multiple balconies with views of the Bay Bridge. Lastly, there’s a secret Broom Closet up on the 7th floor.\n\nIt’s a lovely office.",
        "languageCode": "en"
      },
      "authorAttribution": {
        "displayName": "Matt B",
        "uri": "https://www.google.com/maps/contrib/104641095422852249098/reviews",
        "photoUri": "https://lh3.googleusercontent.com/a-/ALV-UjWk8qO_qslrJAsU8AckTpNvL7ovyWJ4Xz7cMzI6Oabnbet38tAQSw=s128-c0x00000000-cc-rp-mo-ba8"
      },
      "publishTime": "2024-08-31T21:41:39.851689Z",
      "flagContentUri": "https://www.google.com/local/review/rap/report?postId=ChZDSUhNMG9nS0VJQ0FnSURaaThfRFlREAE&d=17924085&t=1",
      "googleMapsUri": "https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChZDSUhNMG9nS0VJQ0FnSURaaThfRFlREAE!2m1!1s0x8085806415f06bdf:0xf048a8b5bd7b0cf3"
    },
    {
      "name": "places/ChIJ32vwFWSAhYAR8wx7vbWoSPA/reviews/ChZDSUhNMG9nS0VJQ0FnSUNmaGVDVElBEAE",
      "relativePublishTimeDescription": "6 months ago",
      "rating": 4,
      "text": {
        "text": "Not very easy mission this one, the “haum sweet haum” mission. I entered it easily, taked all the guards down but then I came across the network hack. It was very hard because I needed to use a quadrocopter but I didnt had one. I hacked cameras to acces the last checkpoint. It took me 3 hours straight. (😭🙏)",
        "languageCode": "en"
      },
      "originalText": {
        "text": "Not very easy mission this one, the “haum sweet haum” mission. I entered it easily, taked all the guards down but then I came across the network hack. It was very hard because I needed to use a quadrocopter but I didnt had one. I hacked cameras to acces the last checkpoint. It took me 3 hours straight. (😭🙏)",
        "languageCode": "en"
      },
      "authorAttribution": {
        "displayName": "NSL",
        "uri": "https://www.google.com/maps/contrib/102342586973502806639/reviews",
        "photoUri": "https://lh3.googleusercontent.com/a-/ALV-UjUiIqur5LfmmGelXFGmdCo6n4TeTEkTfNVjI10FoPqmKHvn60dG=s128-c0x00000000-cc-rp-mo-ba2"
      },
      "publishTime": "2024-12-30T20:41:31.017153Z",
      "flagContentUri": "https://www.google.com/local/review/rap/report?postId=ChZDSUhNMG9nS0VJQ0FnSUNmaGVDVElBEAE&d=17924085&t=1",
      "googleMapsUri": "https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChZDSUhNMG9nS0VJQ0FnSUNmaGVDVElBEAE!2m1!1s0x8085806415f06bdf:0xf048a8b5bd7b0cf3"
    },
    {
      "name": "places/ChIJ32vwFWSAhYAR8wx7vbWoSPA/reviews/ChdDSUhNMG9nS0VJQ0FnSUR6Mk9Ebm9nRRAB",
      "relativePublishTimeDescription": "a year ago",
      "rating": 5,
      "text": {
        "text": "Here is Google's San Francisco office, not head quater (Head quater is located in MTV)\n\nCan experiense  great view with Oakland Bay Bridge from google office.",
        "languageCode": "en"
      },
      "originalText": {
        "text": "Here is Google's San Francisco office, not head quater (Head quater is located in MTV)\n\nCan experiense  great view with Oakland Bay Bridge from google office.",
        "languageCode": "en"
      },
      "authorAttribution": {
        "displayName": "TNK SN",
        "uri": "https://www.google.com/maps/contrib/100102643406719889132/reviews",
        "photoUri": "https://lh3.googleusercontent.com/a-/ALV-UjX4pVIvAw-pCnpCSM_BijgHLqBGUDIRcEoCH3i7tUtIWFsa1tSRww=s128-c0x00000000-cc-rp-mo-ba6"
      },
      "publishTime": "2024-06-07T09:38:36.307850Z",
      "flagContentUri": "https://www.google.com/local/review/rap/report?postId=ChdDSUhNMG9nS0VJQ0FnSUR6Mk9Ebm9nRRAB&d=17924085&t=1",
      "googleMapsUri": "https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChdDSUhNMG9nS0VJQ0FnSUR6Mk9Ebm9nRRAB!2m1!1s0x8085806415f06bdf:0xf048a8b5bd7b0cf3"
    }
  ]
}

```

# Usage in frontend example

To display the reviews of a place you can do it like this (very basic markup!). I encourage every user to build their own
markup of the reviews, fitting their design.

```php
<?php

// 1. Connect to module
$module = $modules->get('GooglePlaceDetails');

// 2. Save the details array to a variable
$details = $module->getPlaceDetails();

// 3. Extract the data you want to iterate over
$reviews = $details['reviews'];

// For debug purpose dump the array to inspect the data
// TRACY DEBUGGER MODULE REQUIRED
// dump($reviews);

<?php foreach ($reviews as $review) { ?>
    <div>
        <img src="<?=$review["authorAttribution"]["photoUri"]?>"/>
        <h4><?=$review["authorAttribution"]["displayName"]?></h4>
        <p>
            <?php

            $isoString = $review["publishTime"];

            $date = new DateTime($isoString);

            $date->setTimezone(new DateTimeZone('Europe/Berlin'));

            $formattedDate = $date->format('d.m.Y');

            echo $formattedDate;

            ?>
        </p>
        <?php for ($i = 1; $i <= ($review['rating']); $i++) { ?>
            &#9733;
        <?php } ?>
        <p><?=$review["originalText"]["text"]?></p>
    </div>
<?php } ?>

?>
```


Here is a more advanced and nicer looking version (UIKit 3 Framework Markup is used)

```php
<div class="uk-container">
    <div uk-slider>
        <div class="uk-position-relative">
            <div class="uk-slider-container">
                <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-height-medium">

                    <?php foreach ($reviews as $review) { ?>

                        <li>
                            <div class="uk-card uk-card-default uk-card-body">
                                <div>
                                    <img src="<?=$review["authorAttribution"]["photoUri"]?>" class="uk-responsive-width" style="height: 30px;" />
                                    <span class="uk-text-middle"><?=$review["authorAttribution"]["displayName"]?></span>
                                </div>
                                <div class="uk-margin">
                                    <?php for ($i = 1; $i <= ($review['rating']); $i++) { ?>
                                        &#9733;
                                    <?php } ?>
                                    <?php for ($i = 1; $i <= 5 - ($review['rating']); $i++) { ?>
                                        &#9734;
                                    <?php } ?>
                                </div>
                                <div uk-overflow-auto="selContainer: .uk-slider-items; selContent: .uk-card">
                                    <p><?=$review["originalText"]["text"]?></p>
                                </div>
                            </div>
                        </li>

                    <?php } ?>
                </ul>
            </div>
            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
    </div>
</div>
```

If you are already using UIKit 3 and just want to get a quick result I put the code example above in a function that can can be called
like this:

```php
<?
$module = $modules->get('GooglePlaceDetails');
echo $module->getUIKitMarkupExample();
?>
```

The template file which is used for the markup lies inside the module directory. Adjust it to your needs.
