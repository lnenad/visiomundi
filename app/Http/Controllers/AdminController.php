<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Journal;
use Input;
use Redirect;
use Str;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$journals = Journal::orderBy('id', 'DESC')->get();

		return view('admin.index', compact('journals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createarticle($journal)
	{
		$journal = Journal::whereSlug($journal)->first();
		$gen_url = "administration/".$journal->slug."/article/store";

		return view('admin.createarticle', compact('journal', 'gen_url'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		//$user_id = Auth::user()->id;
		$slug = str_slug($input['name'],'-');

		if (Journal::whereSlug($slug)) 
			$slug .= "-".rand(0,100);

		$input = array_add($input, 'slug', $slug);

		$input = array_add($input, 'usersincharge', '2');

		$journal = Journal::create($input);

		return Redirect::route('administration.index')->with('message', 'Journal created.');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storearticle($journal)
	{
		$input = Input::all();
		$journal_obj = Journal::whereSlug($journal)->first();
		$slug = str_slug($input['title'],'-');

		if (Article::whereSlug($slug)) 
			$slug .= "-".rand(0,100);

			$input = array_add($input, 'journal_id', $journal_obj->id);
			$input = array_add($input, 'slug', $slug);

			$article = Article::create($input);
			$user_id = Auth::user()->id;
			$article->users()->attach($user_id);
			//Article cat attachment $article->categories()->attach($user_id)

			return Redirect::route('administration.show', $journal)->with('message', 'Article created.');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Journal $journal)
	{
		$articles = $journal->articles;

		return view('admin.show', compact('articles', 'journal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($journal)
	{
		$journal = Journal::whereSlug($journal)->first();
		return view('admin.edit', compact('journal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editarticle($journal, $article)
	{
		$article = Article::whereSlug($article)->first();

		return view('admin.editarticle', compact('journal','article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Journal $journal)
	{
		$input = Input::all();
		//$user_id = Auth::user()->id;
		//dd($journal);
		$slug = str_slug($input['name'],'-');

		if (Journal::whereSlug($slug)) 
			$slug .= "-".rand(0,100);

		$input = array_add($input, 'slug', $slug);
		$journal->update($input);

		return Redirect::route('administration.index')->with('message', 'Journal updated.');
	}

	public function updatearticle($journal, $article_id)
	{
		$article = Article::whereSlug($article_id)->first();
		$input = Input::except('_method', '_token');
		$slug = str_slug($input['title'],'-');
		if (Article::whereSlug($slug)) 
			$slug .= "-".rand(0,100);

		$input = array_add($input, 'slug', $slug);
		//$user_id = Auth::user()->id;
		//dd($journal);
		$article->update($input);

		$user_id = Auth::user()->id;

		$exists = $article->users->contains($user_id);
		if (!$exists) {
			$article->users()->attach($user_id);
		}

		return Redirect::route('administration.show',$journal)->with('message', 'Article updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Journal $journal)
	{
		$journal->delete();

		return Redirect::route('administration.index')->with('message', 'Journal deleted.');

	}

	public function destroyarticle($journal, $article_id)
	{
		$article = Article::whereSlug($article_id)->first();
		$article->delete();
 
		return Redirect::route('administration.show', $journal)->with('message', 'Article deleted.');
	}

}
