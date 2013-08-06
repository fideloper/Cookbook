<?php namespace Cookbook\Exception;

interface HandlerInterface {

	/**
	 * Handle Cookbook Exceptions
	 *
	 * @param \Cookbook\Exception\CookbookException
	 * @return void
	 */
	public function handle(CookbookException $exception);

}