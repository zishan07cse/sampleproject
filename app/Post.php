<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	public $timestamps = false;
	protected $fillable = ['user_Id', 'post_id', 'title', 'body'];
	//

}
