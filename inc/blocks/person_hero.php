<?php
    $image = get_field("image");
    $background = get_field("background");
    $tag = get_field("tag") ?: "Тэг";
    $heading = get_field("heading") ?: "Заголовок";
    $description = get_field("description") ?: "Описание";
    $buttonText = get_field("button_text") ?: "Кнопка";
?>
<section class="person-hero">
    <img
        src="<?= CONTENTEAM_BLOCKS_URL."/assets/images/person-hero-background.png" ?>"
        class="person-hero__background"
        loading="lazy"
        decoding="async"
        fetchpriority="low"
        draggable="false"
    />
    <?php
        echo wp_get_attachment_image($background, [400, 800], false, [
            "class" => "person-hero__image--mobile",
            "loading" => "lazy",
            "draggable" => "false"
        ]); 
    ?>    
    <div class="person-hero__main blocks-container">
        <?php
            echo wp_get_attachment_image($image, [500, 500], false, [
                "class" => "person-hero__image",
                "loading" => "lazy",
                "draggable" => "false"
            ]); 
        ?>
        <div class="person-hero__content">
            <div class="person-hero__tag"><?= $tag ?></div>
            <h1 class="person-hero__heading"><?= $heading ?></h1>
            <div class="person-hero__description"><?= $description ?></div>
            <button class="person-hero__button"><?= $buttonText ?></button>
        </div>
    </div>
</section>