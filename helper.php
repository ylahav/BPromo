<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

class ModBpromoHelper
{
	/**
	 * Get the item
	 *
	 * @return  object	The item.
	 */
	public static function getItem($params)
	{
		$items = array();
		$index = 0;
		for ($idx = 1; $idx < 11; $idx++) {
			if (!empty($params['image'.$idx])) {
				$items[$index]['image'] = $params['image'.$idx];
				$items[$index]['url'] = $params['url'.$idx];
				$index++;
			}
		}
		$jdx = rand(0, $index - 1);
		return $items[$jdx];
	}
}
