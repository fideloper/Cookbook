<?php namespace\Log;

class VoidLogger implements LoggerInterface {

	public function log($level, $message, array $context = array())
	{
		// This log is forever lost to the void
		return true;
	}

}