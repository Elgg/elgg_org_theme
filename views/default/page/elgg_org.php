<?php
/**
 * Elgg page shell for elgg.org landing
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 *
 * Override for the landing_header header.
 */

// render content before head so that JavaScript and CSS can be loaded. See #4032
$topbar = elgg_view('page/elements/topbar', $vars);
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$header = elgg_view('elgg_org/landing_header', $vars);
$body = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);

$page_class = elgg_extract('page_class', $vars);

// Set the content type
header("Content-type: text/html; charset=UTF-8");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body>
<div class="elgg-page elgg-page-default elgg-page-elgg-org <?php echo $page_class; ?>">
	<div class="elgg-page-messages">
		<?php echo $messages; ?>
	</div>

	<?php if (elgg_is_logged_in()): ?>
	<div class="elgg-page-topbar">
		<div class="elgg-inner">
			<?php echo $topbar; ?>
		</div>
	</div>
	<?php endif; ?>

	<div class="elgg-page-header">
		<a href="https://github.com/elgg/elgg"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png" alt="Fork me on GitHub"></a>
		<div class="elgg-inner">
			<?php echo $header; ?>
		</div>
	</div>
	<div class="elgg-page-body">
		<div class="elgg-inner">
			<?php echo $body; ?>
		</div>
	</div>
	<div class="elgg-page-footer">
		<div class="elgg-inner">
			<?php echo $footer; ?>
		</div>
	</div>
</div>
<?php echo elgg_view('page/elements/foot'); ?>
</body>
</html>