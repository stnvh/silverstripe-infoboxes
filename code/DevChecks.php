<?php

class DevChecks extends LeftAndMainExtension {

	public function init() {

		parent::init();

		/* 
		- type 0: serious
		- type 1: warning
		- type 2: info
		*/

		$defaults = array(
			'pass' => array(
				'type' => 0,
				'show' => false,
				'message' => 'Default password'
			),
			'dev' => array(
				'type' => 1,
				'show' => false,
				'message' => 'Dev mode'
			)
		);

		/* pass */
		if($member = Member::currentUser()) {
			if(!$member->Email) {
				$defaults['pass']['show'] = true;
			}
		}

		/* dev */
		if(Director::get_environment_type() == 'dev') {
			$defaults['dev']['show'] = true;
		}

		/* end user in, leave stuff after this */

		$parse = array(
			'Data' => ''
		);

		foreach($defaults as $key => $data) {
			$key = str_replace('"', '\"', $key);
			$data['message'] = str_replace('"', '\"', $data['message']);

			if($data['show'] === false) {
				$data['show'] = 0;
			} elseif($data['show'] === true) {
				$data['show'] = 1;
			}

			$parse['Data'] .= $key . '||' . $data['type'] . '||' . $data['show'] . '||' . $data['message'] . '[]';
		}

		Requirements::css('devchecks/css/DevChecks.css');
		Requirements::javascriptTemplate('devchecks/javascript/DevChecks.js', $parse);
	}

}
