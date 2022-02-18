<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Post;
use GuzzleHTTP\Clinet;


class Home extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$client = new \GuzzleHttp\Client(); 
		

		$resposts = $client->request('GET', 'http://jsonplaceholder.typicode.com/posts')->getBody();
		$objposts = json_decode($resposts, true);
		
		$totalposts = Post::count();
		if($totalposts==0){
			for($i=0;$i<40;$i++){
				$posts = new Post();
				$posts->user_Id = $objposts[$i]['userId'];
				$posts->post_id = $objposts[$i]['id'];
				$posts->title = $objposts[$i]['title'];
				$posts->body = $objposts[$i]['body'];
				$posts->save();
			}
			echo "Posts save sucessfully on first time request";
			echo "<br>";
		}
			
			
		$rescomnt = $client->request('GET', 'http://jsonplaceholder.typicode.com/comments')->getBody();
		$objcomnt = json_decode($rescomnt, true);
	   	
		$totalcomments = Comment::count();
		if($totalcomments==0){
			for($i=0;$i<31;$i++){
				$comment = new Comment();
				$comment->post_Id = $objcomnt[$i]['postId'];
				$comment->comment_id = $objcomnt[$i]['id'];
				$comment->name = $objcomnt[$i]['name'];
				$comment->email = $objcomnt[$i]['email'];
				$comment->body = $objcomnt[$i]['body'];
				$comment->save();
			}
			echo "Comments save sucessfully on first time request";
		}
		echo "<br>";
		echo "<br>";
		
		echo "The api path is in the http://localhost:8000/api";
	}

	public function api(){
		$result	= DB::table('posts')
		->select('posts.id','posts.title','posts.body','comments.email')
		->join('comments','comments.id','=','posts.id')
		->get();
		$resultapi = json_encode($result); 
		echo $resultapi;
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
		//
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
