<?php namespace Cookbook\Log;

interface LoggerInterface {

	/**
	 * Cookbook Log Interface
	 *
	 * @param 	string 		$level 		Log level as per RFC 5424
	 * @param 	string 		$message 	Log information, message
	 * @param 	array   	$context 	The log context
	 * @return 	Boolean 	Whether the record has been processed
	 */
	public function log($level, $message, array $context = array());

}