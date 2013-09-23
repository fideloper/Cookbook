<?php namespace Cookbook\Form\Article;

use Cookbook\Validation\ValidableInterface;
use Cookbook\Repositories\Article\ArticleInterface;

class ArticleForm {

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
	 * Create new article
	 *
	 * @return Boolean
	 */
	public function create(array $data)
	{
		if( $this->validator->setData($data)->passes() )
		{
			$this->article->create( $this->data );
			return true;
		}
		return false;
	}

	/**
	 * Update an article
	 *
	 * @return Boolean
	 */
	public function update(array $data)
	{
		if( $this->validator->setData($data)->passes() )
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