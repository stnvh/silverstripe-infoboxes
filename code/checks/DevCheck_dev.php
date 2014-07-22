<?php

class DevCheck_dev implements DevChecks_interface {

	public function showMessage() {
		return Director::isDev();
	}

	public function getMessage() {
		return 'Dev Mode';
	}

	public function getSeverity() {
		return 1;
	}

}
