<?php namespace Cookbook\Validation;

use Illuminate\Validation\Factory;

abstract class AbstractLaravelValidation implements ValidableInterface {

	/**
	 * Validator
	 *
	 * @var \Illuminate\Validation\Factory
	 */
	protected $validator;

	/**
	 * Data to validation
	 *
	 * @var array
	 */
	protected $data = array();

	/**
	 * Validation errors
	 *
	 * @var array;
	 */
	protected $errors = array();

	/**
	 * Validation rules
	 *
	 * @var array;
	 */
	protected $rules = array();

	public function __construct(Factory $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Set input data to validate
	 *
	 * @return \Cookbook\Validation\ValidableInterface
	 */
	public function setData(array $data)
	{
		$this->data = $data;

		return $this;
	}	

	/**
	 * Test if validation passes or fails
	 *
	 * @return Boolean
	 */
	public function passes()
	{
		$validator = $this->validator->make($this->data, $this->rules);

		if( $validator->fails() )
		{
			$this->errors = $validator->messages();
			return false;
		}

		return true;
	}

	/**
	 * Return errors, if any
	 *
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

}