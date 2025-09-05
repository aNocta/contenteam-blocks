<?php

function contenteam_case_item(){
    ?>
        <article class="cases__item">
            <a class="cases__link" href="<?php the_permalink() ?>">
                <?php the_post_thumbnail("medium-large", [
                    "loading" => "lazy",
                    "class" => "cases__image"
                ]) ?>
                <div class="cases__info">
                    <h3 class="cases__heading"><?php the_title() ?></h3>
                    <div class="cases__excerpt"><?php the_excerpt() ?></div>
                </div>
            </a>
        </article>
    <?php
}

function contenteam_case_pages(int $total){
    echo '<div class="cases-navigation">';
    echo '<button class="cases-navigation__button cases-navigation__button--prev" style="display:none;">Назад</button>';
    if($total > 1){
        for($i = 0; $i < $total; $i++){
            ?>
            <button class="cases-navigation__button<?= !$i ? " cases-navigation__button--active" : "" ?>" data-page="<?= $i + 1 ?>"><?= $i + 1 ?></button>
            <?php
        }
    }
    echo '<button class="cases-navigation__button cases-navigation__button--next">Далее</button>';
    echo '</div>';
}

function contenteam_case_cats(mixed $cat = -1){
    $terms = get_terms([
        "taxonomy" => "case_cat"
    ]);
    echo '<div class="cases-cats" id="cats">';
    printf('<button class="cases-cats__button%s" data-cat="-1">Все</button>', $cat === -1 ? " cases-cats__button--active" : "");
    foreach($terms as $term){
        ?>
            <button class="cases-cats__button<?= $cat === $term->slug ? " cases-cats__button--active" : "" ?>" data-cat="<?= $term->slug ?>"><?= $term->name ?></button>
        <?php
    }
    echo '</div>';
}

function contenteam_case_catalog(mixed $cat = -1){
    $props = [
        "post_type" => "case",
        "posts_per_page" => 6,
    ];
    if($cat && $cat != -1){
        $props["tax_query"] = [[
            "taxonomy" => "case_cat",
            "field" => "slug",
            "terms" => [$cat]
        ]]; 
    }
    $query = new WP_Query($props);
    contenteam_case_cats($cat);
    echo '<div class="cases">';
    while($query->have_posts()){
        $query->the_post();
        contenteam_case_item();
    }
    wp_reset_postdata();
    echo '</div>';
    contenteam_case_pages($query->max_num_pages);
}
add_action("case_catalog", "contenteam_case_catalog", 10, 1);


function contenteam_case_catalog_ajax(){
    $page = $_POST["page"] ?? 1;
    $cat = $_POST["cat"] ?? -1;

    $props = [
        "post_type" => "case",
        "posts_per_page" => 6,
        "paged" => $page,
    ];
    if($cat != -1){
        $props["tax_query"] = [[
            "taxonomy" => "case_cat",
            "field" => "slug",
            "terms" => [$cat]
        ]]; 
    }
    $query = new WP_Query($props);
    ob_start();
    while($query->have_posts()){
        $query->the_post();
        contenteam_case_item();
    }
    wp_reset_postdata();
    wp_send_json_success([
        "cases" => ob_get_clean(),
        "pages" => $query->max_num_pages
    ]);
}
add_action("wp_ajax_case_catalog", "contenteam_case_catalog_ajax");
add_action("wp_ajax_nopriv_case_catalog", "contenteam_case_catalog_ajax");