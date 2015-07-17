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
				return $visitorInfo->countryCode;
            case "continent":
                return $visitorInfo->continentCode;
            case "currency":
                return $visitorInfo->currencyCode;
		}
		return $visitorInfo->countryCode;
	}

	public static function getItem($params, $visitorInfo)
	{
		$imagesDir = $params['ruledefault']->image;
		$images = glob(JPATH_ROOT . "/images/bpromo/" . $imagesDir . "/*.{jpg,png,gif}", GLOB_BRACE);
		$jdx = rand(0, count($images) - 1);
		$item['image'] = JURI::base() . "images/bpromo/" . $imagesDir . "/" . basename($images[$jdx]);
		$item['url'] = $params['ruledefault']->url;
		/* check rules... */
		for ($idx = 0; $idex < 6; $idex++) {
			$curRule = $params['rule' . strval($idex + 1)];
			if (!empty($curRule->ruletype)) {
				$visitorData = ModBpromoHelper::getVisitorData( $curRule->ruletype, $visitorInfo );
				if (in_array( $visitorData, explode(",",$curRule->reulevals) )) {
					$imagesDir = $curRule->image;
					$images = glob(JPATH_ROOT . "/images/bpromo/" . $imagesDir . "/*.{jpg,png,gif}", GLOB_BRACE);
					$jdx = rand(0, count($images) - 1);
					$item['image'] = JURI::base() . "images/bpromo/" . $imagesDir . "/" . basename($images[$jdx]);
					$item['url'] = $curRule->url;
					break;
				}
			}
		}
		return $item;
	}
}
