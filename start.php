<?php
/**
 * Elgg Community Theme
 *
 * @todo
 * Pull "who uses Elgg" entries from the screenshot on community.
 *     Need to expose some sort of WSAPI for that.
 *
 * Make the sidebar always show news
 *
 * Code remaining:
 *     CRUD for services / supporters / events
 *	      Include expiration date
 *
 * Content remaining:
 *     * Features
 *     * Slider slides
 *     * Domain policy
 *     * FAQs?
 *
 * Possible additions:
 *     Pull in latest discussion from community in sidebar.
 */
     
elgg_register_event_handler('init', 'system', 'elgg_org_theme_init');

function elgg_org_theme_init() {
	elgg_extend_view('css/elgg', 'css/elgg_org');
	elgg_register_js('jquery.coda_slider',
			elgg_get_site_url() . 'mod/elgg_org_theme/vendor/jquery.coda_slider/javascripts/jquery.coda-slider-2.0.js');

	elgg_register_simplecache_view('css/coda_slider');
	$url = elgg_get_simplecache_url('css', 'coda_slider');
	elgg_register_css('jquery.coda_slider', $url);

	elgg_register_simplecache_view('js/elgg_org');
	$url = elgg_get_simplecache_url('js', 'elgg_org');
	elgg_register_js('elgg.elgg_org', $url);

	elgg_register_plugin_hook_handler('index', 'system', 'elgg_org_theme_front_page');
	
	// menus

	$items = array(
//		'home' => array('Home', 'elgg.org'),
		'foundation' => array('Foundation', '/foundation/'),
		'community' => array('Community', 'community.elgg.org'),
		'news' => array('News', 'blog/all'),
		'hosting' => array('Hosting', '/hosting/'),
		'services' => array('Services', '/service_providers/'),
		'docs' => array('Docs', 'docs.elgg.org'),
		'downloads' => array('Downloads', '/releases/')
	);

	// remove the entire site menu because we replace it with these.
	$menus = get_config("menus");
	$menus['site'] = array();
	elgg_set_config('menus', $menus);

	foreach ($items as $id => $info) {
		list($text, $href) = $info;
		$item = new ElggMenuItem($id, $text, $href);
		elgg_register_menu_item('elgg_org_site', $item);
		elgg_register_menu_item('site', $item);
		elgg_register_menu_item('footer_navigation', $item);
	}

	// downloads
	// 1.7
	$release = ElggRelease::getLatestReleaseFromBranch(1.7);
	if ($release) {
		$href = elgg_view('output/url', array(
			'text' => '<h2>Download</h2>Elgg 1.7',
			'href' => $release->getURL(),
			'class' => 'elgg-button elgg-button-featured',
			'is_trusted' => true
		));
		$item = new ElggMenuItem('1.7', $href, false);
		elgg_register_menu_item('elgg_org_downloads', $item);
	}

	$release = ElggRelease::getLatestReleaseFromBranch(1.8);
	if ($release) {
		$href = elgg_view('output/url', array(
			'text' => '<h2>Download</h2>Elgg 1.8',
			'href' => $release->getURL(),
			'class' => 'elgg-button elgg-button-featured',
			'is_trusted' => true
		));
		$item = new ElggMenuItem('1.8', $href, false);
		elgg_register_menu_item('elgg_org_downloads', $item);
	}

	// elgg_org features
	$items = array(
		'activity' => 'Activity',
		'blogs' => 'Blogs',
		'bookmarks' => 'Bookmarks',
		'groups' => 'Groups',
		'the_wire' => 'The Wire',
		'messages' => 'Messages',
	);

	foreach ($items as $id => $text) {
		$href = false;
		$img = elgg_normalize_url("mod/elgg_org_theme/graphics/features/$id.png");
		$text = "<img src=\"$img\" /><br />$text";
		$item = new ElggMenuItem($id, $text, $href);
		elgg_register_menu_item('elgg_org_features', $item);
	}

	// elgg_org elgg users
	$items = array(
		'wiley' => array('Wiley Publishing', 'wiley.com'),
		'oxfam' => array('oxFam', 'oxfam.com'),
		'uf' => array('University of Florida', 'uf.edu'),
		'australia' => array('Australian Government', 'au.gov.au'),
	);

	foreach ($items as $id => $info) {
		list($text, $href) = $info;
		$img = elgg_normalize_url("mod/elgg_org_theme/graphics/elgg_users/$id.jpg");
		$text = "<img alt=\"$text\" src=\"$img\" />";

		$item = new ElggMenuItem($id, $text, $href);
		elgg_register_menu_item('elgg_org_users', $item);
	}

	// remove entity menus unless logged in.
	elgg_register_plugin_hook_handler('prepare', 'menu:entity', 'elgg_org_theme_remove_entity_menu');
}

/**
 * Elgg community site front page handler
 *
 * @param string $hook
 * @param string $type
 * @param bool $return
 * @param array $params
 * @return bool
 */
function elgg_org_theme_front_page($hook, $type, $return, $params) {
	if ($return == true) {
		// another hook has already replaced the front page
		return $return;
	}

	elgg_load_js('jquery.coda_slider');
	elgg_load_css('jquery.coda_slider');
	elgg_load_js('elgg.elgg_org');

	$body = elgg_view_menu('elgg_org_site', array(
		'class' => 'elgg-menu-hz',
		'sort_by' => 'register'
	));

	$body .= elgg_view_layout('one_sidebar', array(
		'content' => elgg_view('elgg_org/landing_content'),
		'sidebar' => elgg_view('elgg_org/landing_sidebar')
	));

	$title = 'Elgg.org';
	echo elgg_view_page($title, $body, 'elgg_org', array(
		'page_class' => 'elgg-page-elgg-org-landing'
	));
	
	return true;
}

/**
 * Remove entity menus
 *
 * @param type $hook
 * @param type $type
 * @param type $value
 * @param type $params
 * @return type
 */
function elgg_org_theme_remove_entity_menu($hook, $type, $value, $params) {
	if (!elgg_is_logged_in()) {
		return array();
	}
}

/**
 * Gets an array of slides to display on the landing page
 *
 * @return array
 */
function elgg_org_theme_get_slides() {

	$gfx = elgg_normalize_url('mod/elgg_org_theme/graphics/');

	return array(
		array(
			'title' => 'Introducing a powerful open source social networking engine.',
			'body' => 'Providing you with the tools you need to build socially aware applications.',
			'image' => "$gfx/slides/pic.jpg"
		),

		array(
			'title' => 'Amazing fun for everyone.',
			'body' => 'You will have amazing amounts of fun with Elgg.',
			'image' => "$gfx/slides/community.jpg"
		),

		array(
			'title' => 'Elgg does everything.',
			'body' => 'Hamsters. Cats. Dogs. You name it!',
			'image' => "$gfx/slides/hamsters.jpg"
		),

		array(
			'title' => 'Another slide',
			'body' => 'With more info',
			'image' => "$gfx/slides/pic.jpg"
		)
	);
}