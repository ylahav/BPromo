<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_bpromo
 *
 * @copyright   Copyright (C) 2015 Yair Lahav, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined("_JEXEC") or die("Restricted access");

class ModBpromoHelper
{
	/**
	 * Get the item
	 *
	 * @return  object	The item.
	 */

	static function getVisitorData ($dataType, $visitorInfo) {
		switch ($dataType) {
			case "country":
				return $visitorInfo['countryCode'];
            case "continent":
                return $visitorInfo['continentCode'];
            case "currency":
                return $visitorInfo['currencyCode'];
		}
		return $visitorInfo->countryCode;
	}

	public static function getItem($params, $visitorInfo)
	{
		$imagesDir = $params['defaultrule']->image;
		$images = glob(JPATH_ROOT . "/images/" . $imagesDir . "/*.{jpg,png,gif}", GLOB_BRACE);
		$jdx = rand(0, count($images) - 1);
		$item['image'] = JURI::base() . "images/" . $imagesDir . "/" . basename($images[$jdx]);
		$item['url'] = $params['defaultrule']->url;
		/* check rules... */
        $rulesEncoded = $params['list_rules'];
        $rules = json_decode($rulesEncoded);
        if (!empty( $rules )) {
            for( $idx = 0; $idx < count( $rules->ruleType ); $idx++ ) {
				if (!empty($rules->ruleType[$idx]) && !empty($visitorInfo)) {
                    $visitorData = ModBpromoHelper::getVisitorData( $rules->ruleType[$idx], $visitorInfo );
                    if (in_array( $visitorData, explode(",", $rules->reulevals[$idx]) )) {
                        $imagesDir = $rules->image[$idx];
                        $images = glob(JPATH_ROOT . "/images/" . $imagesDir . "/*.{jpg,png,gif}", GLOB_BRACE);
                        $jdx = rand(0, count($images) - 1);
                        $item['image'] = JURI::base() . "images/" . $imagesDir . "/" . basename($images[$jdx]);
                        $item['url'] = $rules->url[$idx];
                        break;
                    }
                }
            }
        }
		return $item;
	}
}
