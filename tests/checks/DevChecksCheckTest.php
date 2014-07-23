<?php

class DevChecksCheckTest extends SapphireTest {

	public function testShowMessage() {

		$dev = new DevCheck_dev();
		$pass = new DevCheck_pass();

		$dev_return = $dev->showMessage();
		$pass_return = $pass->showMessage();

		$this->showMessageTest($dev_return);
		$this->showMessageTest($pass_return);

	}

	public function testGetMessage() {

		$dev = new DevCheck_dev();
		$pass = new DevCheck_pass();

		$dev_return = $dev->getMessage();
		$pass_return = $pass->getMessage();
		
		$this->getMessageTest($dev_return);
		$this->getMessageTest($pass_return);

	}

	public function testGetSeverity() {

		$dev = new DevCheck_dev();
		$pass = new DevCheck_pass();

		$dev_return = $dev->getSeverity();
		$pass_return = $pass->getSeverity();
		
		$this->getSeverityTest($dev_return);
		$this->getSeverityTest($pass_return);

	}

	private function showMessageTest($value) {
		$this->assertInternalType('boolean', $value);
	}

	private function getMessageTest($value) {
		$this->assertInternalType('string', $value);
	}

	private function getSeverityTest($value) {
		$this->assertInternalType('integer', $value);
		$this->assertLessThanOrEqual(2, $value);
		$this->assertGreaterThanOrEqual(0, $value);
	}

}
