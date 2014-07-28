<?php

class InfoBoxes extends LeftAndMainExtension {

	/**
	 * @return void
	 */
	public function init() {

		parent::init();

		$conf = $this->boxes();

		$parsed = $this->parseForJS($conf);

		Requirements::css(INFOBOXES_DIR . '/css/InfoBoxes.css');
		Requirements::javascriptTemplate(INFOBOXES_DIR . '/javascript/InfoBoxes.js', $parsed);
	}

	/**
	 * Returns all implementors of InfoBox (all checks / box info)
	 * @return array $conf
	 */
	private function boxes() {
		$conf = array();

		$checks = ClassInfo::implementorsOf('InfoBox');
		foreach($checks as $class) {
			$inst = Injector::inst()->get($class);
			$name = explode('_', $class);
			if($name[1]) {
				$class = $name[1];
			}
			if($inst->show()) {
				$conf[$class]['type'] = $inst->severity();
				$conf[$class]['message'] = $inst->message();
			}
		}
		return $conf;
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

		foreach($array as $data) {
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
