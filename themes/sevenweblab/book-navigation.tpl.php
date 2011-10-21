<?php
// $Id: book-navigation.tpl.php,v 1.3 2009/02/18 14:28:21 webchick Exp $

/**
 * @file
 * Default theme implementation to navigate books. Presented under nodes that
 * are a part of book outlines.
 *
 * Available variables:
 * - $tree: The immediate children of the current node rendered as an
 *   unordered list.
 * - $current_depth: Depth of the current node within the book outline.
 *   Provided for context.
 * - $prev_url: URL to the previous node.
 * - $prev_title: Title of the previous node.
 * - $parent_url: URL to the parent node.
 * - $parent_title: Title of the parent node. Not printed by default. Provided
 *   as an option.
 * - $next_url: URL to the next node.
 * - $next_title: Title of the next node.
 * - $has_links: Flags TRUE whenever the previous, parent or next data has a
 *   value.
 * - $book_id: The book ID of the current outline being viewed. Same as the
 *   node ID containing the entire outline. Provided for context.
 * - $book_url: The book/node URL of the current outline being viewed.
 *   Provided as an option. Not used by default.
 * - $book_title: The book/node title of the current outline being viewed.
 *   Provided as an option. Not used by default.
 *
 * @see template_preprocess_book_navigation()
 */
?>

<!--
<?php if ($tree || $has_links): ?>
  <div id="book-navigation-<?php print $book_id; ?>" class="book-navigation">
    <?php print $tree; ?>

    <?php if ($has_links): ?>
    <div class="page-links clearfix">
      <?php if ($prev_url) : ?>
        <a href="<?php print $prev_url; ?>" class="page-previous" title="<?php print t('Go to previous page'); ?>"><?php print t('‹ ') . $prev_title; ?></a>
      <?php endif; ?>
      <?php if ($parent_url) : ?>
        <a href="<?php print $parent_url; ?>" class="page-up" title="<?php print t('Go to parent page'); ?>"><?php print t('up'); ?></a>
      <?php endif; ?>
      <?php if ($next_url) : ?>
        <a href="<?php print $next_url; ?>" class="page-next" title="<?php print t('Go to next page'); ?>"><?php print $next_title . t(' ›'); ?></a>
      <?php endif; ?>
    </div>
    <?php endif; ?>

  </div>
<?php endif; ?>
-->

<?php
if(isset($_SESSION['session_id'])) {	
	$unique_session_id = $_SESSION['session_id'];
} else {
	$unique_session_id = 0;
}

$browser = $_SERVER['HTTP_USER_AGENT']; // get the browser name
$curr_page = $_SERVER['PHP_SELF'];// get page name
$ip = $_SERVER['REMOTE_ADDR'];   // get the IP address
$from_page = $_SERVER['HTTP_REFERER'];//  page from which visitor came
$page = $_SERVER['REQUEST_URI'];//get current page

db_insert('weblabux_pathdata')
	->fields(array(
	  'session_id' => $unique_session_id,
	  'from_url' => $from_page,
	  'to_url' => $page,
	  'link_type' => '0',
	  'time_stamp' => time(),
	  'guid' => $unique_session_id,
	  'from_title' => "TODO: Get Drupal/Book title",
	))
	->execute();
?>