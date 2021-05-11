<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Blog, Tag};

class BlogController extends Controller
{
	public function index()
	{
		$blogs = Blog::leftjoin('tags as t', 't.id', 'blogs.tag_id')->get();

		return view('blog.index', compact('blogs'));
	}

	public function create()
	{
		$tags = Tag::get();
		return view('blog.create', compact('tags'));
	}

	public function store(Request $request)
	{
		$blogs = new Blog;
		$blogs->title = $request->title;
		$blogs->content = $request->content;
		$blogs->tag_id = $request->tag_id;
		$blogs->save();

		return redirect('blog')->with('success', 'Added successfully');
	}

    //
}
