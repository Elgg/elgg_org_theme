<?php
/**
 * Scrollable banner with download buttons and screen shots
 *
 * @todo fix this to just use the module + image block
 */

$gfx = elgg_normalize_url('mod/elgg_org_theme/graphics/');

$title = 'Introducing a powerful open source social networking engine.';
$body = 'Providing you with the tools you need to build socially aware applications.';
$blurb = elgg_view_module('featured', $title, $body);

$title = 'Amazing fun for everyone.';
$body = 'You will have amazing amounts of fun with Elgg.';
$blurb2 = elgg_view_module('featured', $title, $body);

$title = 'Elgg does everything.';
$body = 'Hamster. Cats. Dogs. You name it!';
$blurb3 = elgg_view_module('featured', $title, $body);

// downloads
echo elgg_view_menu('elgg_org_downloads', array('class' => 'elgg-menu-hz'));
?>

<div id="coda-nav-left-1"><a class="elgg-banner-scroller elgg-banner-prev"><img src="<?php echo $gfx; ?>/slider-banner-left.png" width="22" height="33"></a></div>

<ul class="elgg-banner coda-slider preload" id="slider">
	<li class="elgg-inner panel">
		<div class="panel-wrapper float elgg-banner-blurb">
			<?php echo $blurb; ?>
		</div>
		<img class="elgg-screenshot float-alt" src="<?php echo $gfx;?>/slides/pic.jpg" />
	</li>

	<li class="elgg-inner panel">
		<div class="panel-wrapper float elgg-banner-blurb">
			<?php echo $blurb2; ?>
		</div>
		<img class="elgg-screenshot float-alt" src="<?php echo $gfx;?>/slides/community.jpg" />
	</li>

	<li class="elgg-inner panel">
		<div class="panel-wrapper float elgg-banner-blurb">
			<?php echo $blurb3; ?>
		</div>
		<img class="elgg-screenshot float-alt" src="<?php echo $gfx;?>/slides/hamsters.jpg" />
	</li>
</ul>

<div id="coda-nav-right-1"><a class="elgg-banner-scroller elgg-banner-next"><img src="<?php echo $gfx; ?>/slider-banner-right.png" width="22" height="33"></a></div>