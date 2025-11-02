<?php
    $heading = get_field("heading");
?>
<section class="blocks-container blocks-container--global-gaps blocks-container--big-gaps">
    <h2 class="blocks-container__title"><?= $heading ?></h2>
    <div class="problems">
        <?php while(have_rows("problems")){
            the_row();
            $icon = get_sub_field("icon");
            $title = get_sub_field("title");
            $description = get_sub_field("description");
        ?>
            <section class="problems__item">
                <header class="problems__header">
                    <?= wp_get_attachment_image($icon, [110, 110], true, [
                        "loading" => "lazy",
                        "alt" => $title,
                        "fetchpriority" => "low",
                        "draggable" => "false",
                        "class" => "problems__icon"
                    ]) ?>
                    <h3 class="problems__heading"><?= $title ?></h3>
                </header>
                <p class="problems__description"><?= $description ?></p>
            </section>
        <?php } ?>
    </div>
</section>