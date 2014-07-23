<?php

interface DevChecks_interface {

	/**
	 * Determines if the message should be shown
	 * @return bool
	 */
	public function showMessage();

	/**
	 * Determines the message to show
	 * @return string
	 */
	public function getMessage();

	/**
	 * Determines the severity of the message
	 * @return int either 0, 1, 2
	 */
	public function getSeverity();

}
