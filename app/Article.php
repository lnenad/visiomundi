<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model {
	protected $guarded = [];
	protected $userIds = null;

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
