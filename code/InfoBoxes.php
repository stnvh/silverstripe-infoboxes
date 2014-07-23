<?php

class InfoBoxes extends LeftAndMainExtension {

	/**
	 * @return void
	 */
	public function init() {

		parent::init();

		$conf = array();

		$checks = ClassInfo::implementorsOf('InfoBox');
		foreach($checks as $i => $class) {
			$inst = Injector::inst()->get($class);
			if($inst->show()) {
				$conf[$i]['type'] = $inst->severity();
				$conf[$i]['message'] = $inst->message();
			}
		}

		$parsed = $this->parseForJS($conf);

		Requirements::css(INFOBOXES_DIR . '/css/InfoBoxes.css');
		Requirements::javascriptTemplate(INFOBOXES_DIR . '/javascript/InfoBoxes.js', $parsed);
	}

	/**
	 * Parses configuration array for use in JS template
	 * @param array $array
	 * @return array $parse
	 */
	private function parseForJS($array) {
		$parse = array(
			'Data' => '['
		);

		foreach($array as $key => $data) {
			$data['message'] = $this->escapeJS($data['message']);
			$parse['Data'] .= '[' . $data['type'] . ', \'' . $data['message'] . '\'], ';
		}
		$parse['Data'] = substr($parse['Data'], 0, -2) . ']';

		return $parse;
	}

	/**
	 * Escapes string content to prevent XSS etc. on frontend
	 * @param string $string
	 * @return string $string
	 */
	private function escapeJS($string) {
		$escape = array(
			"'"
		);
		$replace = array(
			"\'"
		);
		$string = Convert::raw2xml($string);
		$string = str_replace($escape, $replace, $string);
		return $string;
	}

}
