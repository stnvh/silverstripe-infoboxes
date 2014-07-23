<?php

class InfoBox_pass implements InfoBox {

	public function show() {
		if($member = Member::currentUser()) {
			if(!$member->Email) {
				return true;
			}
		}
		return false;
	}

	public function message() {
		return 'Default password';
	}

	public function severity() {
		return 0;
	}

}
