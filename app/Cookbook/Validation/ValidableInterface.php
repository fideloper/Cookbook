<?php namespace Cookbook\Validation;

interface ValidableInterface {
	
	/**
	 * Set input data to validate
	 *
	 * @return \Cookbook\Validation\ValidableInterface
	 */
	public function setData(array $data);	

	/**
	 * Test if validation passes or fails
	 *
	 * @return Boolean
	 */
	public function passes();

	/**
	 * Return errors, if any
	 *
	 * @return array
	 */
	public function getErrors();

}