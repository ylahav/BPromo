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
            foreach( $rules as $aRule ) {
                if (!empty($aRule->ruletype) && !empty($visitorInfo)) {
                    $visitorData = ModBpromoHelper::getVisitorData( $aRule->ruletype, $visitorInfo );
                    if (in_array( $visitorData, explode(",",$aRule->reulevals) )) {
                        $imagesDir = $aRule->image;
                        $images = glob(JPATH_ROOT . "/images/" . $imagesDir . "/*.{jpg,png,gif}", GLOB_BRACE);
                        $jdx = rand(0, count($images) - 1);
                        $item['image'] = JURI::base() . "images/" . $imagesDir . "/" . basename($images[$jdx]);
                        $item['url'] = $aRule->url;
                        break;
                    }
                }
            }
        }
		return $item;
	}
}
