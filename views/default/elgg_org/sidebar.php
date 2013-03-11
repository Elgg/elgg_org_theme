<?php
/**
 * Sidebar for the elgg.org landing page
 */

$posts =  elgg_get_entities(array(
	'type' => 'object',
	'subtype' => 'blog',
	'limit' => 5,
	'full_view' => false
));

foreach ($posts as $id => $post) {
	$item = new ElggMenuItem($id, $post->title, $post->getURL());
	$item->setSection('news');
	elgg_register_menu_item('page', $item);
}
//
//$links = array(
//	'url' => 'Some random link. Maybe a recent forum topic?',
//	'url2' => 'Random link 2', 'More random links',
//);
//
//foreach ($links as $url => $text) {
//	$item = new ElggMenuItem($url, $text, $url);
//	$item->setSection('links');
//	elgg_register_menu_item('page', $item);
//}

echo elgg_view_menu('page', array(
	'sort_by' => 'register',
	'show_section_headers' => true,
));