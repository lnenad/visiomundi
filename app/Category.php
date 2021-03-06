<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	/** articles function
	* Return all articles.
	*
	* @return Response
	*/
	public function articles()
	{
		return $this->belongsToMany('App\Article');	
	}

	public function journals()
	{
		return $this->belongsToMany('App\Journal');	
	}
	
}
