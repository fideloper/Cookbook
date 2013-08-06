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
		// Get page, default to 1 if not present
    	$page = Input::get('page', 1);

    	// Include which $page we are currently on
    	$pagiData = $this->article->byPage($page);

        $articles = Paginator::make($pagiData->items, $pagiData->totalItems, $pagiData->perPage);

        return View::make('home')->with('articles', $articles);
	}

}