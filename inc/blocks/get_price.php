<?php
    $heading = get_field("heading");
    $description = get_field("description");
?>

<section class="get-price">
    <div class="get-price__wrapper blocks-container blocks-container--global-gaps">
        <h2 class="get-price__heading"><?= $heading ?></h2>
        <p class="get-price__description"><?= $description ?></p>
        <div class="get-price__buttons">
            <button class="get-price__button">Узнать стоимость</button>
            <button class="get-price__button get-price__button--show-cases">Посмотреть кейсы</button>
        </div>
    </div>
</section>