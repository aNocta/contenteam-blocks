<section class="results-block" style="background-image:url('<?= CONTENTEAM_BLOCKS_URL."/assets/images/blueground.webp" ?>')">
    <div class="blocks-container blocks-container--global-gaps blocks-container--big-gaps">
        <h2 class="results-block__heading">В результате вы получите</h2>
        <div class="results-block__grid">
            <?php while(have_rows("items")): 
                the_row();
                $title = get_sub_field("title");
                $description = get_sub_field("description");        
            ?>
                <section class="results-block__item">
                    <h3 class="results-block__title"><?= $title ?></h3>
                    <p class="results-block__description"><?= $description ?></p>
                </section>            
            <?php endwhile; ?>
        </div>
    </div>
</section>