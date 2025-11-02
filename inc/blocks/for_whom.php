<section class="for-whom blocks-container blocks-container--global-gaps blocks-container--big-gaps">
    <h2 class="blocks-container__title for-whom__heading">Для кого этот пакет</h2>
    <div class="for-whom__grid">
        <?php while(have_rows("items")): 
            the_row();
            $title = get_sub_field("title");
            $description = get_sub_field("description");        
            $background = get_sub_field("background");        
        ?>    
            <section class="for-whom__item">
                <?=
                    wp_get_attachment_image($background, [600, 240], false, [
                        "loading" => "lazy",
                        "alt" => $title,
                        "fetchpriority" => "low",
                        "draggable" => "false",
                        "class" => "for-whom__image"
                    ])
                ?>
                <h3 class="for-whom__title"><?= $title ?></h3>
                <p class="for-whom__description"><?= $description ?></p>
            </section>    
        <?php endwhile; ?>
    </div>
</section>