<div class="steps blocks-container blocks-container--global-gaps blocks-container--big-gaps">
    <h2 class="blocks-container__title steps__heading">Как мы работаем</h2>
    <ol class="steps__items">
        <?php while(have_rows("steps")):
            the_row();
            $title = get_sub_field("title");
            $description = get_sub_field("description");
        ?>
            <li class="steps__item">
                <div class="steps__content">
                    <h3 class="steps__title"><?= $title ?></h3>
                    <p class="steps__description"><?= $description ?></p>
                </div>
            </li>
        <?php endwhile; ?>
    </ol>
</div>