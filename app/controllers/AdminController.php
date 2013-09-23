<?php

use Cookbook\Repositories\Article\ArticleInterface;
use Cookbook\Form\Article\ArticleForm;

class AdminController extends \BaseController {

	protected $article;
	protected $form;

	public function __construct(ArticleInterface $article, ArticleForm $form)
	{
		$this->article = $article;
		$this->form = $form;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get page, default to 1 if not present
    	$page = Input::get('page', 1);

    	// Include which $page we are currently on
    	$pagiData = $this->article->byPage($page);

        $articles = Paginator::make($pagiData->items, $pagiData->totalItems, $pagiData->perPage);

        return View::make('admin.article_index')->with('articles', $articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if( $this->form->save( Input::all() ) )
		{
			return Redirect::to('/admin/articles')->with('status', 'success');
		}

		// Back to create page with input, errors and status
		return Redirect::to('/admin/articles/create')
						->withInput( Input::all() )
						->withErrors( $this->form->errors() )
						->with('status', 'error');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}