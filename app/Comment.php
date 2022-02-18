<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	public $timestamps = false;
	protected $fillable = ['post_Id', 'comment_id', 'name', 'body','email'];
	//

}
