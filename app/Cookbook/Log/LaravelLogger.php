<?php namespace Cookbook\Log;

use Illuminate\Log\Writer;

class LaravelLogger implements LoggerInterface {

	protected $log;

	public function __constuct(Writer $log)
	{
		$this->log = $log;
	}

	public function log($level, $message, array $context = array())
	{
		$method = 'add'.ucfirst($level);

		return $this->log->$method($message, $context);
	}

}