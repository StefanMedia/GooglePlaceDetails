<?php

//dump($details);

$reviews = $details['result']['reviews'];

?>

<h1 class="uk-text-center"><?=$details['result']['name']; ?></h1>
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
                                    <?    for ($i = 1; $i <= 5 - ($review['rating']); $i++) { ?>
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