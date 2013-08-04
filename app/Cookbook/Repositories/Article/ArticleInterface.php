<?php namespace Cookbook\Repositories\Article;

interface ArticleInterface {
	
	/**
	 * Get paginated articles
	 *
	 * @param int  Number of articles per page
	 * @return array Collection of articles
	 */
	public function byPage($limit=10);
	
	/**
	 * Get single article by URL
	 *
	 * @param string  URL slug of article
	 * @return object object of article information
	 */
	public function bySlug($slug);
	
	/**
	 * Get articles by their tag
	 *
	 * @param string  URL slug of tag
	 * @param int Number of articles per page
	 * @return array Collection of articles
	 */
	public function byTag($tag, $limit=10);
	
}