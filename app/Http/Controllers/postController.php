<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Post;


class postController extends Controller
{

 public function index(){
		$post = Post::all();
		return view ('index',compact('post'));

	 }
	public function add(){
		return view("add");

	}
	public function submit(Request $request){
		$val = new Post($request->all());
		$val->title = $request ->title;
		$val->description = $request->description;
		$val->save();
		return back();
	}

	public function edit($id){
		$post = Post::find($id);
		return view("edit",compact('post'));
	}

public function update(Request $request,$id){
		$post =  Post::find($id);
		$post->title = $request ->title;
		$post->description = $request->description;
		$post->save();
	}
}
