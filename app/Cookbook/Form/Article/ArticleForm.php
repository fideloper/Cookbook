<?php namespace Cookbook\Form\Article;

use Cookbook\Validation\ValidableInterface;
use Cookbook\Repositories\Article\ArticleInterface;

class ArticleForm {

	/**
	 * Input data
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Validator
	 *
	 * @var Cookbook\Validation\ValidableInterface
	 */
	protected $validator;

	/**
	 * Article repository
	 *
	 * @var Cookbook\Repositories\Article\ArticleInterface
	 */
	protected $article;

	public function __construct(ValidableInterface $validator, ArticleInterface $article)
	{
		$this->validator = $validator;
		$this->article = $article;
	}

	/**
	 * Set input data
	 *
	 * @param array Input data
	 * @return \Cookbook\Form\Article\ArticleForm
	 */
	public function data(array $data)
	{
		$this->data = $data;
		return $this;
	}

	public function new()
	{
		if( $this->validator->passes() )
		{
			$this->article->create( $this->data );
			return true;
		}
		return false;
	}

	public function save()
	{
		if( $this->validator->passes() )
		{
			$this->article->update( $this->data );
			return true;
		}
		return false;
	}

	/**
	 * Get validation errors, if any
	 *
	 * @return array
	 */
	public function errors()
	{
		return $this->validator->errors();
	}

}