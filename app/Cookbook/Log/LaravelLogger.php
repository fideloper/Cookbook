<?php namespace Cookbook\Log;

use Illuminate\Log\Writer;

class LaravelLogger implements LoggerInterface {

	protected $log;

	public function __construct(Writer $log)
	{
		$this->log = $log;
	}

	public function log($level, $message, array $context = array())
	{
		return $this->log->$level($message, $context);
	}

}