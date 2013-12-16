<?php
/**
 * Community Theme css extensions
 *
 * Light grey: #eeeeee
 * Dark grey: #bebebe
 * Grey text: #666666
 *
 * Dark blue text: #0054A7
 * Lighter blue: #4690D6
 * 
 */

$gfx = elgg_normalize_url('mod/elgg_org_theme/graphics');
?>

/*****
Common
*****/
body {
	background-color: white;
}

.elgg-page-body {
	background-color: white;
}

/*****
Footer
******/
.elgg-page-default .elgg-page-footer {
	background-color: black;
	border-top: 2px solid #bebebe;
	width: 100%;
	color: white;
}

.elgg-page-default .elgg-page-footer > .elgg-inner {
	border: 0;
	margin-top: 12px;
	margin-bottom: 12px;
}

.elgg-page-default .elgg-page-footer h2 {
	color: #4690D6;
	font-size: 14px;
	padding-bottom: 12px;
	margin-bottom: 12px;
	font-weight: normal;
	background: url(<?php echo $gfx; ?>/silver_border_h.gif) no-repeat scroll left bottom transparent
}

/* subpage compress header */
.elgg-page-default .elgg-page-header > .elgg-inner {
	height: 105px;
}


/*****
featured module
******/

.elgg-module-featured {
	border: 0px;
}

.elgg-module-featured > .elgg-head {
	background-color: white;
}

.elgg-module-featured > .elgg-head > h3 {
	color: #0054A7;
	font-size: 18px;
	line-height: 20px;
}

.elgg-module-featured > .elgg-body {
	padding: 5px;
	font-face: Arial,Helvetica,sans-serif,"Franklin Gothic Medium";
	font-style: italic;
	color: #666666;
	font-size: 14px;
	line-height: 16px;
}

/*****
landing banner
******/

.elgg-banner .elgg-module-featured {
	border: 0px;
	margin: 28px 0 0 36px;
	min-height: 145px;
}

.elgg-banner .elgg-module-featured > .elgg-head {
	background-color: transparent;
	padding-left: 0px;
}

.elgg-banner .elgg-module-featured > .elgg-head > h3 {
	color: white;
	font-size: 24px;
	line-height: 25px;
	margin-bottom: 8px;
}

.elgg-banner .elgg-module-featured > .elgg-body {
	padding: 5px 5px 5px 0;
	font-style: italic;
	font-size: 20px;
	line-height: 21px;
	color: #eee;
}

.elgg-banner-scroller {
	top: 175px;
	position: absolute;
	cursor: pointer;
	z-index: 10;
}

.elgg-banner-scroller.elgg-banner-next {
	margin-left: -28px;
}

/******
Dot org landing
*******/

.elgg-page-elgg-org-landing > .elgg-page-header {
	background: url(<?php echo $gfx;?>/header_bk.jpg) repeat-x scroll left top #4690D6;
	border-bottom: 2px solid #BEBEBE;
}

.elgg-page-elgg-org-landing > .elgg-page-header > .elgg-inner {
	height: 365px;
}

.elgg-page-elgg-org-landing > .elgg-page-header > .elgg-inner > h1 {
	top: 10px;
	left: 58px;
	position: absolute;
}

.elgg-banner {
	padding: 75px 24px 24px 24px;
    overflow: hidden;
    position: relative;
	margin: auto;
}

.elgg-banner > li {
	visibility: hidden;
}


.elgg-banner .elgg-inner.panel {
	height: 268px;
}

.elgg-banner-blurb {
	width: 442px;
	text-align: left;
}

.elgg-banner img.elgg-screenshot {
	margin-right: 42px;
	box-shadow: 0 0 25px #666666;
	max-width: 446px;
	max-height: 267px;
}

/****
 Menus
 ***/

.elgg-menu-elgg-org-downloads {
	padding: 20px 0 0 36px;
	text-align: center;
	position: absolute;
	top: 248px;
	z-index: 10;
}

.elgg-menu-elgg-org-downloads > li {
	margin: 0 15px;
}

.elgg-menu-elgg-org-site {
	background-color: #0054A7;
	overflow: hidden;
	text-align: center;
}

.elgg-menu-elgg-org-site > li {
	background: url(<?php echo $gfx;?>/nav_border-right.jpg) no-repeat scroll right top transparent;
	font-size: 20px;
	font-weight: normal;
	margin: 8px 0;
	padding: 10px 24px;
}

.elgg-menu-elgg-org-site > li > a {
	color: white;
	font-weight: bold;
}

.elgg-menu-elgg-org-site > li:last-child {
	background: none;
}

.elgg-elgg-org-slider {
	background-color: #eeeeee;
	overflow: hidden;
	border-top: 1px solid #bebebe;
	border-bottom: 1px solid #bebebe;
	text-align: center;
	font-style: normal;
	font-weight: bold;
	color: #666666;
	width: 100%;
}

.elgg-elgg-org-slider > li {
	padding: 10px 24px;
	background: url(<?php echo $gfx;?>/slider-content-border.jpg) no-repeat scroll right top transparent;
}

.elgg-elgg-org-slider > li:last-child {
	background: none;
}

.elgg-menu-footer-navigation {
	float: left;
}

.elgg-menu-footer-navigation > li {
	display: block;
	padding: 0 0 0 14px;
	background: url("<?php echo $gfx; ?>/bullets.gif") no-repeat scroll left center transparent;
	font-size: 12px;
}

.elgg-page-footer .elgg-menu > li, .elgg-page-footer .elgg-menu > li > a {
	color: white;
}

.elgg-menu-footer-navigation > li:after {
	content: none;
	padding: 0;
}


/****
 Download buttons
 ***/

.elgg-button.elgg-button-featured {
	padding: 12px 8px 8px;
	margin: 10px 0 0;
	border: 0;
	box-shadow: none;
	background: url(<?php echo $gfx; ?>/orng_btn.png) no-repeat scroll center 4px transparent;
	width: 152px;
	height: 60px;
	color: white;
	font-size: 14px;
	line-height: 14px;
}

.elgg-button.elgg-button-featured h2 {
	color: white;
	font-size: 22px;
	line-height: 20px;
}

.elgg-button.elgg-button-featured:hover {
	text-decoration: none;
}

.elgg-page-elgg-org > .elgg-page-body {
	background-color: #eeeeee;
}

.elgg-page-elgg-org > .elgg-page-body > .elgg-inner {
	background-color: white;
}

.elgg-page-elgg-org > .elgg-page-body > .elgg-inner .elgg-main {
	padding: 15px;
}

/****
sidebar
*****/

.elgg-page-elgg-org .elgg-sidebar > h2 {
	xbackground-color: white;
}