<section class="hero-main">
	<div class="blocks-container">
		<h1 class="hero-main__title"><?= get_field("header") ?></h1>
		<p class="hero-main__description"><?= get_field("description") ?></p>
		<img
			src="<?= CONTENTEAM_BLOCKS_URL."assets/images/button_mobile.webp" ?>"
			alt="<?= esc_html(get_field("header")) ?>"
			width="186"
			height="190"
			draggable="false"
			loading="lazy"
			decoding="async"
			fetchpriority="high"
			class="hero-main__image"
		/>
		<button class="blocks-button hero-main__button">Связаться с редакцией</button>
	</div>
</section>