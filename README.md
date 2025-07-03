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
Array
(
    [rating] => 4.8
    [userRatingCount] => 82026
    [displayName] => Array
        (
            [text] => Golden Gate Bridge
            [languageCode] => en
        )

    [reviews] => Array
        (
            [0] => Array
                (
                    [name] => places/ChIJw____96GhYARCVVwg5cT7c0/reviews/Ci9DQUlRQUNvZENodHljRjlvT2prd1R6WmxOblpyTW0xUE4yWkNOMDVRV0U1cVUxRRAB
                    [relativePublishTimeDescription] => a week ago
                    [rating] => 5
                    [text] => Array
                        (
                            [text] => This is such a cool place to visit! The pictures don’t really do it justice. It’s such a majestic looking bridge. Walking across it and getting to see the beautiful views of San Francisco is a must! If you walk all the way across the bridge to the scenic overlook be sure to grab a hot dog wrapped in bacon topped with peppers and onions. It was delicious! Wish I had a picture of it, but it was so good I scarfed it down before I thought to take one. The only bad part is they have signs all over the parking lot warning people about car break ins. I had a rental car so I worried the whole time. Apparently it’s a common thing to happen in San Francisco that they have actual street signs everywhere warning people not to leave valuables in your car. Nothing happened to our vehicle, but it was still a concern because of all the signs. Overall though a very fun time at the Golden Gate Bridge!
                            [languageCode] => en
                        )

                    [originalText] => Array
                        (
                            [text] => This is such a cool place to visit! The pictures don’t really do it justice. It’s such a majestic looking bridge. Walking across it and getting to see the beautiful views of San Francisco is a must! If you walk all the way across the bridge to the scenic overlook be sure to grab a hot dog wrapped in bacon topped with peppers and onions. It was delicious! Wish I had a picture of it, but it was so good I scarfed it down before I thought to take one. The only bad part is they have signs all over the parking lot warning people about car break ins. I had a rental car so I worried the whole time. Apparently it’s a common thing to happen in San Francisco that they have actual street signs everywhere warning people not to leave valuables in your car. Nothing happened to our vehicle, but it was still a concern because of all the signs. Overall though a very fun time at the Golden Gate Bridge!
                            [languageCode] => en
                        )

                    [authorAttribution] => Array
                        (
                            [displayName] => Mariano Rivera
                            [uri] => https://www.google.com/maps/contrib/100649519305746728894/reviews
                            [photoUri] => https://lh3.googleusercontent.com/a-/ALV-UjUUsaLYv-JkMaYfoATLS8oeMj1zLdIQYQO3zNpZDf-jWGSdZtQ=s128-c0x00000000-cc-rp-mo-ba3
                        )

                    [publishTime] => 2025-06-24T00:40:25.208517672Z
                    [flagContentUri] => https://www.google.com/local/review/rap/report?postId=Ci9DQUlRQUNvZENodHljRjlvT2prd1R6WmxOblpyTW0xUE4yWkNOMDVRV0U1cVUxRRAB&d=17924085&t=1
                    [googleMapsUri] => https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sCi9DQUlRQUNvZENodHljRjlvT2prd1R6WmxOblpyTW0xUE4yWkNOMDVRV0U1cVUxRRAB!2m1!1s0x808586deffffffc3:0xcded139783705509
                )

            [1] => Array
                (
                    [name] => places/ChIJw____96GhYARCVVwg5cT7c0/reviews/ChdDSUhNMG9nS0VOWFRyNExUNnBlaHpnRRAB
                    [relativePublishTimeDescription] => a week ago
                    [rating] => 5
                    [text] => Array
                        (
                            [text] => Golden Gate Bridge – A Must-See Marvel in San Francisco! 🌉

Visiting the Golden Gate Bridge was truly one of the highlights of my trip to San Francisco. Even after seeing it in countless movies and postcards, nothing compares to experiencing it in person. The sheer size, the bold International Orange color, and the way it stretches across the Bay with the Marin Headlands in the background—it’s breathtaking.

I walked across the entire bridge and back, which took about an hour including lots of photo stops. There are clearly marked pedestrian paths, and the views of the city skyline, Alcatraz, and the Pacific Ocean are incredible from every angle. It gets very windy up there, so bring a jacket—even on sunny days!

If you’re short on time, even a quick stop at the Welcome Center or one of the many lookout points like Battery Spencer or Crissy Field will give you that iconic view and photo op. Parking can be tricky, so public transport or biking over from the city is a great option.

Whether you’re into architecture, history, photography, or just want to experience one of the most famous landmarks in the world, the Golden Gate Bridge is absolutely worth the visit.

⭐️⭐️⭐️⭐️⭐️ (5/5)
                            [languageCode] => en
                        )

                    [originalText] => Array
                        (
                            [text] => Golden Gate Bridge – A Must-See Marvel in San Francisco! 🌉

Visiting the Golden Gate Bridge was truly one of the highlights of my trip to San Francisco. Even after seeing it in countless movies and postcards, nothing compares to experiencing it in person. The sheer size, the bold International Orange color, and the way it stretches across the Bay with the Marin Headlands in the background—it’s breathtaking.

I walked across the entire bridge and back, which took about an hour including lots of photo stops. There are clearly marked pedestrian paths, and the views of the city skyline, Alcatraz, and the Pacific Ocean are incredible from every angle. It gets very windy up there, so bring a jacket—even on sunny days!

If you’re short on time, even a quick stop at the Welcome Center or one of the many lookout points like Battery Spencer or Crissy Field will give you that iconic view and photo op. Parking can be tricky, so public transport or biking over from the city is a great option.

Whether you’re into architecture, history, photography, or just want to experience one of the most famous landmarks in the world, the Golden Gate Bridge is absolutely worth the visit.

⭐️⭐️⭐️⭐️⭐️ (5/5)
                            [languageCode] => en
                        )

                    [authorAttribution] => Array
                        (
                            [displayName] => Liviu Anghelina
                            [uri] => https://www.google.com/maps/contrib/114989591211306301594/reviews
                            [photoUri] => https://lh3.googleusercontent.com/a-/ALV-UjXo7MNb0pQeUPjU66svuRnTOG7F9KJ0ulwwssqauSQGPjpVk6M=s128-c0x00000000-cc-rp-mo-ba4
                        )

                    [publishTime] => 2025-06-25T07:53:49.549123646Z
                    [flagContentUri] => https://www.google.com/local/review/rap/report?postId=ChdDSUhNMG9nS0VOWFRyNExUNnBlaHpnRRAB&d=17924085&t=1
                    [googleMapsUri] => https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChdDSUhNMG9nS0VOWFRyNExUNnBlaHpnRRAB!2m1!1s0x808586deffffffc3:0xcded139783705509
                )

            [2] => Array
                (
                    [name] => places/ChIJw____96GhYARCVVwg5cT7c0/reviews/Ci9DQUlRQUNvZENodHljRjlvT2pCMlNFRm1kakEwWDB4M2VWcHVWMlJUT0Y5SWVtYxAB
                    [relativePublishTimeDescription] => 2 weeks ago
                    [rating] => 5
                    [text] => Array
                        (
                            [text] => You can walk around the beach until you reach the bridge. It's a very nice walk to the bridge. I highly recommend it. There's a cafeteria where you can sit and have a coffee. And a nice green area to bite into and enjoy the view.
                            [languageCode] => en
                        )

                    [originalText] => Array
                        (
                            [text] => You can walk around the beach until you reach the bridge. It's a very nice walk to the bridge. I highly recommend it. There's a cafeteria where you can sit and have a coffee. And a nice green area to bite into and enjoy the view.
                            [languageCode] => en
                        )

                    [authorAttribution] => Array
                        (
                            [displayName] => Czt
                            [uri] => https://www.google.com/maps/contrib/103825063219251805299/reviews
                            [photoUri] => https://lh3.googleusercontent.com/a-/ALV-UjWyylcO9ac4Mr2QnH1lGduT_QJAE_vZjfhuS5CEK__1t5EqU6n5=s128-c0x00000000-cc-rp-mo-ba5
                        )

                    [publishTime] => 2025-06-18T21:29:25.960539749Z
                    [flagContentUri] => https://www.google.com/local/review/rap/report?postId=Ci9DQUlRQUNvZENodHljRjlvT2pCMlNFRm1kakEwWDB4M2VWcHVWMlJUT0Y5SWVtYxAB&d=17924085&t=1
                    [googleMapsUri] => https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sCi9DQUlRQUNvZENodHljRjlvT2pCMlNFRm1kakEwWDB4M2VWcHVWMlJUT0Y5SWVtYxAB!2m1!1s0x808586deffffffc3:0xcded139783705509
                )

            [3] => Array
                (
                    [name] => places/ChIJw____96GhYARCVVwg5cT7c0/reviews/ChdDSUhNMG9nS0VNN0prb3Y4Z2NHWTlnRRAB
                    [relativePublishTimeDescription] => a month ago
                    [rating] => 5
                    [text] => Array
                        (
                            [text] => Growing up in the Bay Area, I always wanted to walk the Golden Gate Bridge, but just always put it off. Well, no longer. We enjoyed a fun, relaxing stroll across the bridge and back on an unseasonably warm and sunny May morning. Parking can be a bit of a challenge since the Welcome Center lot is really small. So please research ahead for potential alternate lots; that made it easy for us. We parked near Crissy Field, and walked just a few minutes to the bridge. You can also park on the north side of the bridge. The walk is gorgeous, although I wish you could return on the opposite side for a different viewpoint. You walk on the east side. During the week, bicyclists use the same side, which can be a bit of a hassle, so keep your eyes open. The walk over and back is about 3.4 miles in total. Overall, a great experience with stunning views of San Francisco, Sausalito, and Alcatraz/Angel Islands.
                            [languageCode] => en
                        )

                    [originalText] => Array
                        (
                            [text] => Growing up in the Bay Area, I always wanted to walk the Golden Gate Bridge, but just always put it off. Well, no longer. We enjoyed a fun, relaxing stroll across the bridge and back on an unseasonably warm and sunny May morning. Parking can be a bit of a challenge since the Welcome Center lot is really small. So please research ahead for potential alternate lots; that made it easy for us. We parked near Crissy Field, and walked just a few minutes to the bridge. You can also park on the north side of the bridge. The walk is gorgeous, although I wish you could return on the opposite side for a different viewpoint. You walk on the east side. During the week, bicyclists use the same side, which can be a bit of a hassle, so keep your eyes open. The walk over and back is about 3.4 miles in total. Overall, a great experience with stunning views of San Francisco, Sausalito, and Alcatraz/Angel Islands.
                            [languageCode] => en
                        )

                    [authorAttribution] => Array
                        (
                            [displayName] => David Liebler
                            [uri] => https://www.google.com/maps/contrib/117164625471877631666/reviews
                            [photoUri] => https://lh3.googleusercontent.com/a/ACg8ocKninwO53JqFrKkHnojurUrbNINQJY0u-nP_3uLrvIMlL9POw=s128-c0x00000000-cc-rp-mo-ba4
                        )

                    [publishTime] => 2025-05-28T18:01:51.978849Z
                    [flagContentUri] => https://www.google.com/local/review/rap/report?postId=ChdDSUhNMG9nS0VNN0prb3Y4Z2NHWTlnRRAB&d=17924085&t=1
                    [googleMapsUri] => https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sChdDSUhNMG9nS0VNN0prb3Y4Z2NHWTlnRRAB!2m1!1s0x808586deffffffc3:0xcded139783705509
                )

            [4] => Array
                (
                    [name] => places/ChIJw____96GhYARCVVwg5cT7c0/reviews/Ci9DQUlRQUNvZENodHljRjlvT2t0VVFrcG1lamxQUVhCaFFtMWliVlp5YUdsNVpIYxAB
                    [relativePublishTimeDescription] => 2 weeks ago
                    [rating] => 4
                    [text] => Array
                        (
                            [text] => As our ship glided under the iconic Golden Gate Bridge, I felt an overwhelming sense of awe. The majestic span towered above us, its vibrant orange-red hue glowing warmly in the sunlight. The bridge's grandeur was mesmerizing, with its suspension towers stretching high into the sky like giant steel sentinels.

The experience was exhilarating – the sound of seagulls filled the air as we sailed beneath the bridge's impressive structure. The cool San Francisco Bay breeze carried the salty scent of the ocean, adding to the sensory delight.

As we passed under the bridge, the fog began to roll in, casting a mystical veil over the landmark. The sudden change in atmosphere added an air of mystery to the experience.

The Golden Gate Bridge is an engineering marvel and an iconic symbol of San Francisco. Passing under it was a thrilling experience that left me with unforgettable memories. If you're a fan of majestic architecture, stunning natural beauty, or simply want to experience one of the world's most famous landmarks, sailing under the Golden Gate Bridge is a must-do.

Rating Breakdown

- *Scenic Beauty:* 5/5
- *Engineering Marvel:* 5/5
- *Overall Experience:* 5/5

I highly recommend adding this experience to your bucket list!
                            [languageCode] => en
                        )

                    [originalText] => Array
                        (
                            [text] => As our ship glided under the iconic Golden Gate Bridge, I felt an overwhelming sense of awe. The majestic span towered above us, its vibrant orange-red hue glowing warmly in the sunlight. The bridge's grandeur was mesmerizing, with its suspension towers stretching high into the sky like giant steel sentinels.

The experience was exhilarating – the sound of seagulls filled the air as we sailed beneath the bridge's impressive structure. The cool San Francisco Bay breeze carried the salty scent of the ocean, adding to the sensory delight.

As we passed under the bridge, the fog began to roll in, casting a mystical veil over the landmark. The sudden change in atmosphere added an air of mystery to the experience.

The Golden Gate Bridge is an engineering marvel and an iconic symbol of San Francisco. Passing under it was a thrilling experience that left me with unforgettable memories. If you're a fan of majestic architecture, stunning natural beauty, or simply want to experience one of the world's most famous landmarks, sailing under the Golden Gate Bridge is a must-do.

Rating Breakdown

- *Scenic Beauty:* 5/5
- *Engineering Marvel:* 5/5
- *Overall Experience:* 5/5

I highly recommend adding this experience to your bucket list!
                            [languageCode] => en
                        )

                    [authorAttribution] => Array
                        (
                            [displayName] => Ardhendu Sarkar
                            [uri] => https://www.google.com/maps/contrib/110027802730006840049/reviews
                            [photoUri] => https://lh3.googleusercontent.com/a-/ALV-UjXb6l7jA0eP_6OKBKDyghtX4TmYWOI5VY73YeRdKiZSrI9Kmj07=s128-c0x00000000-cc-rp-mo-ba4
                        )

                    [publishTime] => 2025-06-13T04:01:43.722551039Z
                    [flagContentUri] => https://www.google.com/local/review/rap/report?postId=Ci9DQUlRQUNvZENodHljRjlvT2t0VVFrcG1lamxQUVhCaFFtMWliVlp5YUdsNVpIYxAB&d=17924085&t=1
                    [googleMapsUri] => https://www.google.com/maps/reviews/data=!4m6!14m5!1m4!2m3!1sCi9DQUlRQUNvZENodHljRjlvT2t0VVFrcG1lamxQUVhCaFFtMWliVlp5YUdsNVpIYxAB!2m1!1s0x808586deffffffc3:0xcded139783705509
                )

        )

)
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
