<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");
?>

    <div id='b-promo-out' class='container-fluid'>
        <div id='b-promo-in'>
            <a href="<?php echo $item['url']; ?>" <?php echo ($params[ 'onepage'])? '': 'target="_blank"'; ?>>
		<img src="<?php echo $item['image']; ?>" alt="promo" />
	</a>
        </div>
    </div>

    <?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");
?>

<div id='b-promo-out' class='container-fluid'>
    <div id='b-promo-in'>
        <a href="<?php echo $item['url']; ?>" <?php echo ($params[ 'samepage'])? '': 'target="_blank"'; ?>>
            <img src="<?php echo $item['image']; ?>" alt="promo" />
        </a>
    </div>
</div>
