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

	/** published function
	* Checks if the article is published.
	*
	* @return Response
	*/
	public function isPublished()
	{
		if ($this->status == 2)	
			return true;
		else 
			return false;
	}
	
	/** getStatus function
	* returns the status.
	*
	* @return Response
	*/
	public function getStatus()
	{
		return $this->status;	
	}
	

}
