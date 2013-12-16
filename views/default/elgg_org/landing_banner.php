<?php
/**
 * Scrollable banner with download buttons and screen shots
 *
 * @todo fix this to just use the module + image block
 */

$gfx = elgg_normalize_url('mod/elgg_org_theme/graphics/');
$slides = elgg_org_theme_get_slides();

// downloads
echo elgg_view_menu('elgg_org_downloads', array('class' => 'elgg-menu-hz'));

?>

<div id="coda-nav-left-1"><a class="elgg-banner-scroller elgg-banner-prev"><img src="<?php echo $gfx; ?>/slider-banner-left.png" width="22" height="33"></a></div>

<ul class="elgg-banner coda-slider preload" id="slider">

	<?php

	foreach ($slides as $info) {
		$module = elgg_view_module('featured', $info['title'], $info['body']);

		echo <<<___HTML
	<li class="elgg-inner panel">
		<div class="panel-wrapper float elgg-banner-blurb">
			$module
		</div>
		<img class="elgg-screenshot float-alt" src="{$info['image']}" />
	</li>
___HTML;
	}
	?>
</ul>

<div id="coda-nav-right-1"><a class="elgg-banner-scroller elgg-banner-next"><img src="<?php echo $gfx; ?>/slider-banner-right.png" width="22" height="33"></a></div>