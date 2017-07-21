<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
$quote_content = array('type' => 'wpo_postconfig', 'format' =>'quote_content');
$quote_author = array('type' => 'wpo_postconfig', 'format' =>'quote_author');
?>
<div class="entry-thumb">
	<div class="content-quote">
		"<?php echo newfashion_wpo_getcontent( $quote_content); ?>"
	</div>
	<div class="quote-author">
		<?php echo newfashion_wpo_getcontent( $quote_author); ?>
	</div>
</div>