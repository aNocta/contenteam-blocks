<?php
    $heading = get_field("heading");
    $description = get_field("description");
?>
<div class="advantages-icons" style="background-image:url('<?= CONTENTEAM_BLOCKS_URL."/assets/images/blueground.webp" ?>')">    
    <div class="blocks-container blocks-container--global-gaps blocks-container--big-gaps">
        <h2 class="advantages-icons__heading"><?= $heading ?></h2>
        <div class="advantages-icons__description"><?= $description ?></div>
        <div class="advantages-icons__grid">
            <?php while(have_rows("advantages")): 
                the_row();
                $icon = get_sub_field("icon");
                $title = get_sub_field("title");
                $description = get_sub_field("description");        
            ?>
                <section class="advantages-icons__item">
                    <header class="advantages-icons__header">
                        <?= wp_get_attachment_image($icon, [90, 90], true, [
                            "loading" => "lazy",
                            "alt" => $title,
                            "fetchpriority" => "low",
                            "draggable" => "false",
                            "class" => "advantages-icons__icon"
                        ]) ?>  
                        <h3 class="advantages-icons__title"><?= $title ?></h3> 
                    </header>
                    <p class="advantages-icons__about"><?= $description ?></p>
                </section>
            <?php endwhile; ?>
        </div>
    </div>
</div>