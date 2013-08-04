<?php namespace Cookbook\Repositories\Article;

use Illuminate\Database\Eloquent\Model;

class EloquentArticle implements ArticleInterface {

	protected $article;
	
	// Class expects an Eloquent model
	public function __construct(Model $article)
	{
		$this->article = $article;
	}

	/**
	 * Get paginated articles
	 *
	 * @param int  Number of articles per page
	 * @return Illuminate\Support\Collection - which is "arrayable"
	 */
	public function byPage($limit=10)
	{
		return $this->article->orderBy('created_at', 'desc')
							 ->paginate($limit);
	}
	
	/**
	 * Get single article by URL
	 *
	 * @param string  URL slug of article
	 * @return object object of article information
	 */
	public function bySlug($slug)
	{
		// Include tags using Eloquent relationships
		return $this->article->with('tags')
							 ->where('slug', $slug)
							 ->first();
	}
	
	/**
	 * Get articles by their tag
	 *
	 * @param string  URL slug of tag
	 * @param int Number of articles per page
	 * @return Illuminate\Support\Collection  Is "arrayable"
	 */
	public function byTag($tag, $limit=10)
	{
		$foundTag = $this->tag->where('slug', $tag)->first();
		
		if( !$foundTag )
		{
			// Empty array to fulfill @return expectations
			// if no tag found
			return array();
		}
		
		// Do our joining a little manually here to accomplish article ordering
		// and to paginate results more easily
		return $this->article->join('articles_tags', 'articles.id', '=', 'articles_tags.article_id')
                             ->where('articles_tags.tag_id', $foundTag->id)
                             ->orderBy('articles.created_at', 'desc')
                             ->paginate($limit);
	}

}