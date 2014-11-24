<?php

class InfoBox_favicon implements InfoBox {

	public function show() {
		if(!file_exists('../favicon.ico')) {
			return true;
		}
		return false;
	}

	public function message() {
		return 'Add favicon';
	}

	public function severity() {
		return 2;
	}

}
