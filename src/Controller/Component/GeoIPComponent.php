<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use GeoIp2\Database\Reader;

class GeoIPComponent extends Component{

	/**
	 * getCountryByIP
	 *
	 * @param (string) $geoIP
	 * @return string
	 */
	public function getCountryByIP($ipAddress) {
		if (empty($ipAddress)) return FALSE;

		$country = NULL;

		//Initialize geoIP
		$readerData = new Reader(GEOIP_COUNTRY_DATA_FILE);
		//Get all country data
		$recordData = $readerData->country($ipAddress);

		return $recordData->country->isoCode;
	}

	/**
	 * getCityByIP
	 *
	 * @param (string) $ipAddress
	 * @return (number) $cityID
	 */
	public function getCityByIP($ipAddress) {
		if (empty($ipAddress)) return FALSE;

		$cityData = NULL;

		//Initialize geoIP
		$readerData = new Reader(GEOIP_CITY_DATA_FILE);
		//Get all city data
		$cityData = $readerData->city($ipAddress);
		return $cityData->city->names['en'];
	}
}
