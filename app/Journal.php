<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model {
	protected $guarded = [];

	public function articles() {
		return $this->hasMany('App\Article');
	}

	public function users() {
		return $this->hasMany('App\User');
	}

	public function categories() {
		return $this->belongsToMany('App\Category');
	}

	/** shortdesc function
	* Generate a short desc.
	*
	* @return Response
	*/
	public function shortdesc($words)
	{
		$about = $this->about;
		return $this->shortenstr( $about , $words);	
	}
	


	public function shortenstr( $str, $wordCount = 10 ) {
	  return implode( 
	    '', 
	    array_slice( 
	      preg_split(
	        '/([\s,\.;\?\!]+)/', 
	        $str, 
	        $wordCount*2+1, 
	        PREG_SPLIT_DELIM_CAPTURE
	      ),
	      0,
	      $wordCount*2-1
	    )
	  );
	}

}
