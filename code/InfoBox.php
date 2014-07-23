<?php

interface InfoBox {

	/**
	 * Determines if the message should be shown
	 * @return bool
	 */
	public function show();

	/**
	 * Determines the message to show
	 * @return string
	 */
	public function message();

	/**
	 * Determines the severity of the message
	 * @return int either 0, 1, 2
	 */
	public function severity();

}
