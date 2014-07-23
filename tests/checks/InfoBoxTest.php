<?php

class InfoBoxTest extends SapphireTest {

	public function testShow() {

		$dev = new InfoBox_dev();
		$pass = new InfoBox_pass();

		$dev_return = $dev->show();
		$pass_return = $pass->show();

		$this->showTest($dev_return);
		$this->showTest($pass_return);

	}

	public function testMessage() {

		$dev = new InfoBox_dev();
		$pass = new InfoBox_pass();

		$dev_return = $dev->message();
		$pass_return = $pass->message();
		
		$this->messageTest($dev_return);
		$this->messageTest($pass_return);

	}

	public function testSeverity() {

		$dev = new InfoBox_dev();
		$pass = new InfoBox_pass();

		$dev_return = $dev->severity();
		$pass_return = $pass->severity();
		
		$this->severityTest($dev_return);
		$this->severityTest($pass_return);

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
