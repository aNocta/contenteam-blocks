<?php 
    $members = get_field("items");
?>
<div class="team blocks-container blocks-container--global-gaps blocks-container--big-gaps swiper">
    <div class="team__header">
        <h2 class="blocks-container__title">Команда</h2>
        <div class="team__arrows carousel__arrows">
            <button class="carousel__arrow carousel__arrow--prev"></button>
            <button class="carousel__arrow carousel__arrow--next"></button>
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
            <div class="team__carousel swiper-wrapper">
                <?php foreach($members as $k => $member): ?>
                    <article class="team__member<?= $k === 0 ? " team__member--selected" : "" ?> swiper-slide">
                        <img
                            src="<?= wp_get_attachment_image_url($member["image"], "member_small") ?>"
                            alt="<?= $member["name"] ?>"
                            class="team__image"
                            draggable="false"
                            loading="lazy"
                            decoding="async"
                            fetchpriority="low"
                        >
                        <h3 class="team__name"><?= $member["name"] ?></h3>
                        <span class="team__position"><?= $member["position"] ?></span>
                        <cite class="team_cite"><?= $member["cite"] ?></cite>
                    </article>
                <?php endforeach ?>
            </div>
            <div class="team__current-info">
                <h3 class="team__info-title"><?= $members[0]["name"] ?></h3>
                <span class="team__info-position"><?= $members[0]["position"] ?></span>
                <cite class="team__info-cite"><?= $members[0]["cite"] ?></cite>
            </div>
        </div>
    <?php endif ?>
</div>