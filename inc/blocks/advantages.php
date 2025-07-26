<?php 
    $advantages = get_field("items");
?>
<section class="advantages">
    <div class="blocks-container blocks-container--global-gaps blocks-contaer--bg-gaps">
        <h2 class="advantages__title">Станем вашим надежным партнером<br/>по копирайтингу и контент-маркетингу</h2>
        <ul class="advantages__items">
            <?php foreach($advantages as $item): ?>
                <li class="advantages__item">
                    <h3 class="advantages__item-title"><?= $item["title"] ?></h3>
                    <span class="advantages__item-description"><?= $item["description"] ?></span>
                </li>
            <?php endforeach ?>
        </ul>
        <button class="advantages__button blocks-button">Обсудить проект</button>
    </div>
</section>