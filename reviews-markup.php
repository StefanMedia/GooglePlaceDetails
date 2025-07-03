<?php

$reviews = $details['reviews'];

?>

<h1 class="uk-text-center"><?=$details['displayName']['text']; ?></h1>
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