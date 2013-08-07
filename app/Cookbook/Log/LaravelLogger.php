<?php namespace Cookbook\Log;

use Illuminate\Log\Writer;

class LaravelLogger implements LoggerInterface {

	protected $log;

	public function __construct(Writer $log)
	{
		$this->log = $log;
	}

	/**
	 * Cookbook Log Interface
	 *
	 * @param 	string 		$level 		Log level as per RFC 5424
	 * @param 	string 		$message 	Log information, message
	 * @param 	array   	$context 	The log context
	 * @return 	Boolean 	Whether the record has been processed
	 */
	public function log($level, $message, array $context = array())
	{
		return $this->log->$level($message, $context);
	}

	/**
	 * Log exception. Laravel Writer can acception an
	 * exception straight off, so no custom logic
	 * really needed.
	 *
	 * @param Exception
	 * @return Boolean
	 */
	public function logException(\Exception $exception)
	{
		return $this->log('error', $exception);
	}

}