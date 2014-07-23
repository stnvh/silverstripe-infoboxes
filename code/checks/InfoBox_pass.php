<?php

class InfoBox_pass implements InfoBox {

	public function show() {
		if($member = Member::currentUser()) {
			if(!$member->Email || Security::has_default_admin()) {
				return true;
			}
		}
		return false;
	}

	public function message() {
		return 'Change password!';
	}

	public function severity() {
		return 0;
	}

}
