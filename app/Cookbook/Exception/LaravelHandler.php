<?php namespace Cookbook\Exception;

use Cookbook\Log\LoggerInterface;

class LaravelHandler implements HandlerInterface {

	/**
	 * Logger used to log Cookbook errors
	 *
	 * @var \Cookbook\Log\LoggerInterface
	 */
	private $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	/**
	 * Handle Cookbook Exceptions
	 *
	 * @param \Cookbook\Exception\CookbookException
	 * @return void
	 */
	public function handle(CookbookException $exception)
	{
		$this->logger->logException($exception);
	}

}