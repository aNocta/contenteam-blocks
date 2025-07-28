<?php
    $category = get_field("category");
    $title = get_field("title");
    $bage = get_field("bage");
    $query = new WP_Query([
        "post_type" => "post",
        "posts_per_page" => 20,
        "orderby" => "date",
        "tax_query" => [[
            "taxonomy" => "category",
            "field" => "term_id",
            "terms" => $category
        ]]
    ]);
?>
<section class="posts-carousel blocks-container blocks-container--global-gaps carousel swiper">
    <div class="posts-carousel__header">
        <h2 class="blocks-container__title"><?= $title ?></h2>
        <div class="carousel__arrows"><button class="carousel__arrow carousel__arrow--prev"></button><button class="carousel__arrow carousel__arrow--next"></button></div>
    </div>
    <div class="posts-carousel__wrapper swiper-wrapper">
        <?php while($query->have_posts()){
            $query->the_post();    
        ?>
        <article class="posts-carousel__item swiper-slide">
            <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail("medium", [
                    "class" => "posts-carousel__image"
                ]) ?>
                <span class="posts-carousel__bage"><?= $bage ?></span>
                <h3 class="posts-carousel__title"><?php the_title() ?></h3>
            </a>
        </article>
        <?php }
        wp_reset_postdata();
        ?>
    </div>
</section>