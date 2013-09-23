<?php namespace Cookbook\Form\Article;

use Cookbook\Validation\AbstractLaravelValidation;

class ArticleValidation extends AbstractLaravelValidation {

	/**
	 * Validation rules
	 *
	 * @var array;
	 */
	protected $rules = array(
		'title' => 'required',
		'slug' => 'required',
		'content' => 'required',
	);

}