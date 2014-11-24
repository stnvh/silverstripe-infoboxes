<?php

class InfoBoxTest extends SapphireTest {

	private function classList() {
		return ClassInfo::implementorsOf('InfoBox');
	}

	public function testShow() {

		$classes = $this->classList();

		foreach($classes as $class) {
			$inst = new $class();

			$return = $inst->show();

			$this->showTest($return);
		}
	}

	public function testShow() {

		$classes = $this->classList();

		foreach($classes as $class) {
			$inst = new $class();

			$return = $inst->message();

			$this->messageTest($return);
		}
	}

	public function testShow() {

		$classes = $this->classList();

		foreach($classes as $class) {
			$inst = new $class();

			$return = $inst->severity();

			$this->severityTest($return);
		}
	}

	private function showTest($value) {
		$this->assertInternalType('boolean', $value);
	}

	private function messageTest($value) {
		$this->assertInternalType('string', $value);
	}

	private function severityTest($value) {
		$this->assertInternalType('integer', $value);
		$this->assertLessThanOrEqual(2, $value);
		$this->assertGreaterThanOrEqual(0, $value);
	}

}
