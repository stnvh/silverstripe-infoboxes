<?php

class DevChecks extends LeftAndMainExtension {

	public function init() {

		parent::init();

		$conf = array();

		$i = 0;
		$checks = ClassInfo::implementorsOf('DevChecks_Interface');
		foreach($checks as $class) {
			$inst = Injector::inst()->get($class);
			if($inst->showMessage()) {
				$conf[$i]['type'] = $inst->getSeverity();
				$conf[$i]['message'] = $inst->getMessage();
			}
			$i++;
		}

		$parsed = $this->parseForJS($conf);

		Requirements::css('devchecks/css/DevChecks.css');
		Requirements::javascriptTemplate('devchecks/javascript/DevChecks.js', $parsed);
	}

	private function parseForJS($array) {
		$parse = array(
			'Data' => ''
		);

		foreach($array as $key => $data) {
			$key = str_replace('"', '\"', $key);
			$data['message'] = str_replace('"', '\"', $data['message']);

			$parse['Data'] .= $key . '||' . $data['type'] . '||' . $data['message'] . '[]';
		}

		return $parse;
	}

}
