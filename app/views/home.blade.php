<h1>This is home page.</h1>

<h2>Articles:</h2>

<ul>
	@foreach( $articles as $article )
	<li>{{ $article->title }}</li>
	@endforeach
</ul>