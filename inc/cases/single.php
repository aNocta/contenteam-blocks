<?php

function contenteam_case_cover(){
    $settings = get_field("cover_settings");
    $image = $settings["image"] ? $settings["image"] : get_post_thumbnail_id();
    $image_mobile = $settings["image_mobile"] ? $settings["image_mobile"] : $image;
    $heading = $settings["heading"] ?  $settings["heading"] : get_the_title();
    $description = $settings["description"] ? $settings["description"] : get_the_excerpt();
    ?>
        <section class="case-cover">
            <?= wp_get_attachment_image($image, [1200, 500], false, [
                "class" => "case-cover__image case-cover__image--desktop",
                "alt" => $heading,
                "draggable" => "false"
            ]) ?>
            <?= wp_get_attachment_image($image_mobile, [400, 550], false, [
                "class" => "case-cover__image case-cover__image--mobile",
                "alt" => $heading,
                "draggable" => "false"
            ]) ?>            
            <h3 class="case-cover__heading"><?= $heading ?></h3>
            <p class="case-cover__description"><?= $description ?></p>
        </section>
    <?php
}
add_action("case_cover", "contenteam_case_cover");