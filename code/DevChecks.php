<?php

class DevChecks extends LeftAndMainExtension {

	/**
	 * @return void
	 */
	public function init() {

		parent::init();

		$conf = array();

		$checks = ClassInfo::implementorsOf('DevChecks_Interface');
		foreach($checks as $i => $class) {
			$inst = Injector::inst()->get($class);
			if($inst->showMessage()) {
				$conf[$i]['type'] = $inst->getSeverity();
				$conf[$i]['message'] = $inst->getMessage();
			}
		}

		$parsed = $this->parseForJS($conf);

		Requirements::css(DEVCHECKS_DIR . '/css/DevChecks.css');
		Requirements::javascriptTemplate(DEVCHECKS_DIR . '/javascript/DevChecks.js', $parsed);
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
