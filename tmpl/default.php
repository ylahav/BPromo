<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_bvinfo
 *
 * @copyright   Copyright (C) 2015 Yair Lahav, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined("_JEXEC") or die("Restricted access");

?>

<div id='b-promo-out' class='container-fluid'>
<div id='b-promo-in'>
	<a href="<?php echo $item['url']; ?>" <?php echo ($params['samepage'])? '': 'target="_blank"'; ?>>
		<img src="<?php echo $item['image']; ?>" alt="promo" />
	</a>
</div>
</div>