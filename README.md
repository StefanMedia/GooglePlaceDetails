Google Place Details for ProcessWire
====================================

WHAT IT DOES
------------

Google Place Details offers the possibility to send requests to the Google Maps API to receive information
about a certain place. A typical use case would be to display the reviews of a place on your website.
But you can receive any other information that the API offers.


BEFORE YOU START
----------------

You need three things:

1. A Google API Key
2. The Place ID
3. A project with a billing account activated

You can set up all of those by using Googles quick start widget here:

https://developers.google.com/maps/third-party-platforms/quick-start-widget-users

HOW TO INSTALL
--------------

1. Copy this directory to /site/modules

2. In your admin, go to Modules > Refresh, then Modules > New

3. Click the "Install" button next to the Google Place Details module

4. Fill out the API Key and Place ID fields in the module settings and you are ready to go.


MODULE SETTINGS FIELD DESCRIPTIONS
----------------------------------

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

USAGE EXAMPLE
-------------

1. Load the module in a page context:

$module = $modules->get('GooglePlaceDetails');

2. Call a function to load data

$module->getPlaceDetails();

This function fetches the data in realtime, on every page request and returns a php array containing the full response from the
Google server.

See the frontend example at the end of this document to see how to extract data from the array in a working example.

PLACE DETAILS ANSWER EXAMPLE
----------------------------

The place details answer will be in JSON format and looks like this (depending of the fields you included in your request)
```
{
  "html_attributions": [],
  "result":
    {
      "name": "Google Workplace 6",
      "rating": 4,
      "reviews":
        [
          {
            "author_name": "Luke Archibald",
            "author_url": "https://www.google.com/maps/contrib/113389359827989670652/reviews",
            "language": "en",
            "profile_photo_url": "https://lh3.googleusercontent.com/a-/AOh14GhGGmTmvtD34HiRgwHdXVJUTzVbxpsk5_JnNKM5MA=s128-c0x00000000-cc-rp-mo",
            "rating": 1,
            "relative_time_description": "a week ago",
            "text": "Called regarding paid advertising google pages to the top of its site of a scam furniture website misleading and taking peoples money without ever sending a product - explained the situation,  explained I'd spoken to an ombudsman regarding it.  Listed ticket numbers etc.\n\nThey left the advertisement running.",
            "time": 1652286798,
          },
          {
            "author_name": "Tevita Taufoou",
            "author_url": "https://www.google.com/maps/contrib/105937236918123663309/reviews",
            "language": "en",
            "profile_photo_url": "https://lh3.googleusercontent.com/a/AATXAJwZANdRSSg96QeZG--6BazG5uv_BJMIvpZGqwSz=s128-c0x00000000-cc-rp-mo",
            "rating": 1,
            "relative_time_description": "6 months ago",
            "text": "I need help.  Google Australia is taking my money. Money I don't have any I am having trouble sorting this issue out",
            "time": 1637215605,
          },
          {
            "author_name": "Jordy Baker",
            "author_url": "https://www.google.com/maps/contrib/102582237417399865640/reviews",
            "language": "en",
            "profile_photo_url": "https://lh3.googleusercontent.com/a/AATXAJwgg1tM4aVA4nJCMjlfJtHtFZuxF475Vb6tT74S=s128-c0x00000000-cc-rp-mo",
            "rating": 1,
            "relative_time_description": "4 months ago",
            "text": "I have literally never been here in my life, I am 17 and they are taking money I don't have for no reason.\n\nThis is not ok. I have rent to pay and my own expenses to deal with and now this.",
            "time": 1641389490,
          },
          {
            "author_name": "Prem Rathod",
            "author_url": "https://www.google.com/maps/contrib/115981614018592114142/reviews",
            "language": "en",
            "profile_photo_url": "https://lh3.googleusercontent.com/a/AATXAJyEQpqs4YvPPzMPG2dnnRTFPC4jxJfn8YXnm2gz=s128-c0x00000000-cc-rp-mo",
            "rating": 1,
            "relative_time_description": "4 months ago",
            "text": "Terrible service. all reviews are fake and irrelevant. This is about reviewing google as business not the building/staff etc.",
            "time": 1640159655,
          },
          {
            "author_name": "Husuni Hamza",
            "author_url": "https://www.google.com/maps/contrib/102167316656574288776/reviews",
            "language": "en",
            "profile_photo_url": "https://lh3.googleusercontent.com/a/AATXAJwRkyvoSlgd06ahkF9XI9D39o6Zc_Oycm5EKuRg=s128-c0x00000000-cc-rp-mo",
            "rating": 5,
            "relative_time_description": "7 months ago",
            "text": "Nice site. Please I want to work with you. Am Alhassan Haruna, from Ghana. Contact me +233553851616",
            "time": 1633197305,
          },
        ],
      "url": "https://maps.google.com/?cid=10281119596374313554",
      "user_ratings_total": 939,
      "website": "http://google.com/",
    },
  "status": "OK",
}
```


USAGE IN FRONTEND EXAMPLE
-------------------------

To display the reviews of a place you can do it like this (very basic markup!). I encourage every user to build their own
markup of the reviews, fitting their design.

```
<?php

// 1. Connect to module
$module = $modules->get('GooglePlaceDetails');

// 2. Save the details array to a variable
$details = $module->getPlaceDetails();

// 3. Extract the data you want to iterate over
$reviews = $details['result']['reviews'];

// For debug purpose dump the array to inspect the data
// TRACY DEBUGGER MODULE REQUIRED
// dump($reviews);

<? foreach ($reviews as $review) { ?>
    <div>
        <img src="<?=$review["profile_photo_url"]?>"/>
        <h4><?=$review["author_name"]?></h4>
        <? for ($i = 1; $i <= ($review['rating']); $i++) { ?>
            &#9733;
        <? } ?>
        <p><?=$review["text"]?></p>
    </div>
<? } ?>

?>
```


Here is a more advanced and nicer looking version (UIKit 3 Framework Markup is used)

```
<div class="uk-container">
    <div uk-slider>
        <div class="uk-position-relative">
            <div class="uk-slider-container">
                <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-height-medium">

                    <? foreach ($reviews as $review) { ?>

                        <li>
                            <div class="uk-card uk-card-default uk-card-body">
                                <div>
                                    <img src="<?=$review["profile_photo_url"]?>" class="uk-responsive-width" style="height: 30px;" />
                                    <span class="uk-text-middle"><?=$review["author_name"]?></span>
                                </div>
                                <div class="uk-margin">
                                    <? for ($i = 1; $i <= ($review['rating']); $i++) { ?>
                                       &#9733;
                                    <? } ?>
                                    <? for ($i = 1; $i <= 5 - ($review['rating']); $i++) { ?>
                                       &#9734;
                                    <? } ?>
                                </div>
                                <div uk-overflow-auto="selContainer: .uk-slider-items; selContent: .uk-card">
                                    <p><?=$review["text"]?></p>
                                </div>
                            </div>
                        </li>

                    <? } ?>
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

```
<?
$module = $modules->get('GooglePlaceDetails');
echo $module->getUIKitMarkupExample();
?>
```

The template file which is used for the markup lies inside the module directory. Adjust it to your needs.
