<?php

class InfoBox_ga implements InfoBox {

	public function show() {
		if(class_exists('SiteConfig')) {
			$conf = SiteConfig::current_site_config();

			if(!$conf->GoogleAnalyticsTrackingID) {
				return true;
			}
		}
		
		return false;
	}

	public function message() {
		return 'Add GA tracking';
	}

	public function severity() {
		return 2;
	}

	public function link() {
		return 'admin/settings';
	}

}
