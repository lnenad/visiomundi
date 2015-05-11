<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	public function users() {
		return $this->belongsToMany('App\User');
	}

	/** categories function
	* Return categories.
	*
	* @return Response
	*/
	public function categories()
	{
		return $this->belongsToMany('App\Category');	
	}
	

}
