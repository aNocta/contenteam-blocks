<?php 
$terms = get_terms(["taxonomy" => "case_cat"]);
$cases = new WP_Query([
    "post_type" => "case",
    "posts_per_page" => -1
]);
?>
<section class="blocks-container blocks-container--global-gaps">
    <h2 class="blocks-container__title">Кейсы</h2>
    <div class="b-cases carousel swiper">
        <div class="b-cases__header">
            <ul class="b-cases__tabs">
                <li class="b-cases__tabs-item b-cases__tabs-item--active"><button class="b-cases__tabs-button">В трендах</button></li>
                <?php foreach($terms as $term): ?>
                    <li class="b-cases__tabs-item"><button class="b-cases__tabs-button" data-term="<?= $term->term_id ?>"><?= $term->name ?></button></li>
                <?php endforeach ?>
            </ul>
            <div class="carousel__arrows">
                <button class="carousel__arrow carousel__arrow--prev"></button>
                <button class="carousel__arrow carousel__arrow--next"></button>
            </div>
        </div>
        <div class="b-cases__carousel-wrapper swiper-wrapper">
            <?php while($cases->have_posts()){
                $cases->the_post();
                $terms = wp_get_post_terms(get_the_ID(), "case_cat");    
                if(empty($terms)) continue;
            ?>
            <article class="b-cases__item swiper-slide" data-term="<?= $terms[0]->term_id ?>">
                <a href="<?php the_permalink() ?>">
                    <div class="b-cases__cover">
                        <span class="b-cases__bage">Кейсы</span>
                        <?php the_post_thumbnail("case_desktop", attr: [
                            "class" => "b-cases__image",
                            "alt" => "Контент-стратегия и блог для сервиса по созданию тестов и квизов"
                        ]) ?>
                    </div>
                    <h3 class="b-cases__title"><?php the_title() ?></h3>
                </a>
            </article>
            <?php } 
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>