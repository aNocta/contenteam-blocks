<?php 
	$items = get_field("items");
?>
<section class="blocks-container blocks-container--global-gaps blocks-container--big-gaps rating">
	<h2 class="blocks-container__title">Рейтинг Рунета 2025</h2>
	<div class="rating__grid">
		<?php foreach($items as $item): ?>
			<a href="<?= $item["link"] ?>" class="rating__item" style="background-image: url('<?= $item["background"] ?>')">
				<h3 class="rating__title"><?= $item["title"] ?></h3>
				<span class="rating__description"><?= $item["description"] ?></span>
			</a>
		<?php endforeach ?>
		<img
			src="<?= CONTENTEAM_BLOCKS_URL."assets/images/click.webp" ?>"
			width="187"
			height="180"
			draggable="false"
			loading="lazy"
			decoding="async"
			fetchpriority="low"
			class="rating__click-picture"
		/>
	</div>
</section>