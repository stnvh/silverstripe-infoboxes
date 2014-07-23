<?php

class InfoBox_dev implements InfoBox {

	public function show() {
		return Director::isDev();
	}

	public function message() {
		return 'Dev Mode';
	}

	public function severity() {
		return 1;
	}

}
