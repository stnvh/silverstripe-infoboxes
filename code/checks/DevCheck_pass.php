<?php

class DevCheck_pass implements DevChecks_interface {

	public function showMessage() {
		if($member = Member::currentUser()) {
			if(!$member->Email) {
				return true;
			}
		}
		return false;
	}

	public function getMessage() {
		return 'Default password';
	}

	public function getSeverity() {
		return 0;
	}

}
