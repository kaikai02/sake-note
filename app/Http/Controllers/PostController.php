<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePost;

class PostController extends Controller
{
    public function index(Request $request)
    {
	$keyword = $request->input('keyword');
	$query = Post::query();
	if(!empty($keyword)) {
	     $query->where('name', 'like', '%'.$keyword.'%')->orWhere('body', 'like', '%'.$keyword.'%');
	}
	
	$posts = $query->orderBy('created_at', 'desc')->paginate(10);
	return view('posts.index', [
		'posts' => $posts,
		'keyword' => $keyword,
	]);
    }

    public function showCreateForm()
    {
	return view('posts/create');
    }

    public function create(CreatePost $request)
    {
	$post = new Post();
	$post->name = $request->name;
	$post->body = $request->body;
	$post->save();
	return redirect()->route('top');
    }

    public function showEditForm(int $id)
    {
	$post = Post::findOrFail($id);
	return view('posts.edit', [
	    'post' => $post,
	]);
    }

    public function edit(int $id, CreatePost $request)
    {
	$post = Post::findOrFail($id);
	$post->name = $request->name;
	$post->body = $request->body;
	$post->save();
	return redirect()->route('top');
    }

    public function destroy(int $id)
    {
	$post = Post::findOrFail($id);
	$post->delete();
	return redirect()->route('top');
    }
}

