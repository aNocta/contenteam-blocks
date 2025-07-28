<?php 
    $members = get_field("items");
?>
<div class="team blocks-container blocks-container--global-gaps blocks-container--big-gaps">
    <div class="team__header">
        <h2 class="blocks-container__title">Команда</h2>
        <div class="team__arrows carousel__arrows">
            <button class="carousel__arrow carousel__arrow--prev" id="team-prev"></button>
            <button class="carousel__arrow carousel__arrow--next" id="team-next"></button>
        </div>
    </div>
    <?php if(!empty($members)): ?>
        <div class="team__content">
            <img
                src="<?= wp_get_attachment_image_url($members[0]["image"], "member_full") ?>"
                alt="<?= $members[0]["name"] ?>"
                class="team__current"
                draggable="false"
                loading="lazy"
                decoding="async"
                fetchpriority="low"
            >
            <div class="team__carousel swiper">
                <div class="swiper-wrapper">
                    <?php foreach($members as $k => $member): ?>
                        <article class="team__member<?= $k === 0 ? " team__member--selected" : "" ?> swiper-slide" data-image="<?= wp_get_attachment_image_url($member["image"], "member_full") ?>">
                            <img
                                src="<?= wp_get_attachment_image_url($member["image"], "thumbnail") ?>"
                                alt="<?= $member["name"] ?>"
                                class="team__image"
                                draggable="false"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="low"
                            >
                            <img
                                src="<?= wp_get_attachment_image_url($member["image"], "member_full") ?>"
                                alt="<?= $member["name"] ?>"
                                class="team__image team__image--mob"
                                draggable="false"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="low"
                            >
                            <h3 class="team__name"><?= $member["name"] ?></h3>
                            <span class="team__position"><?= $member["position"] ?></span>
                            <p class="team__cite"><?= $member["cite"] ?></p>
                        </article>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="team__current-info">
                <h3 class="team__info-name"><?= $members[0]["name"] ?></h3>
                <span class="team__info-position"><?= $members[0]["position"] ?></span>
                <p class="team__info-cite"><?= $members[0]["cite"] ?></p>
            </div>
        </div>
    <?php endif ?>
</div>