<?php
    
use Cookbook\Repositories\Article\ArticleInterface;

class ContentController extends BaseController {
	
	protected $article;
	
	// Inject our article, expects implementation of ArticleInterface
	public function __construct(ArticleInterface $article)
	{
		$this->article = $article;
	}
	
	// Home page route
	public function home()
	{
		// Get 10 latest articles with pagination
		// Still get "arrable" collection of articles
		$articles = $this->article->byPage();
		
		if( count($articles) < 1 )
		{
			App::abort(404);
		}

		return View::make('home')->with('articles', $articles);
	}

}