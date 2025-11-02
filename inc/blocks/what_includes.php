<?php
    $heading = get_field("heading");
?>
<section class="what-includes blocks-container blocks-container--global-gaps blocks-container--big-gaps">
    <h2 class="blocks-container__title what-includes__heading"><?= $heading ?></h2>
    <?php while(have_rows("items")):
        the_row();
        $icon = get_sub_field("icon");
        $title = get_sub_field("title");        
        $points = get_sub_field("points");
    ?>
        <section class="what-includes__item">
            <?= wp_get_attachment_image($icon, [110, 110], true, [
                "loading" => "lazy",
                "alt" => $title,
                "fetchpriority" => "low",
                "draggable" => "false",
                "class" => "what-includes__icon"
            ]) ?>              
            <h3 class="what-includes__title"><?= $title ?></h3>
            <ul class="what-includes__list">
                <?php foreach($points as $point): ?>
                    <li class="what-includes__point"><?= $point["text"] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endwhile; ?>
    <section class="what-includes__item what-includes__item--not-enough">
        <img
            src="<?= CONTENTEAM_BLOCKS_URL."assets/images/searching_glass.png" ?>"
            alt="Чего-то не хватает?"
            class="what-includes__icon"
            width="110"
            height="110"
            draggable="false"
            loading="lazy"
            decoding="async"
            fetchpriority="low"
        >
        <h3 class="what-includes__title">Чего-то не хватает?</h3>
        <p class="what-includes__description">
            Если вам нужны другие материалы, будьте уверены — мы это уже делали.<br/>
            И с удовольствием сделаем для вас!
        </p>    
    </section>
    <button class="what-includes__button">Обсудить мою задачу</button>
</section>