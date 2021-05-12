<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Blog, Tag};

class BlogController extends Controller
{
	public function index()
	{
		$blogs = Blog::leftjoin('tags as t', 't.id', 'blogs.tag_id')
					->leftjoin('users as u', 'u.id', 'blogs.created_by')
					->select('blogs.*', 't.name', 'u.name as author_name')
					->active()
					->paginate(3);

		return view('blog.index', compact('blogs'));
	}

	public function create()
	{
		$tags = Tag::get();
		return view('blog.create', compact('tags'));
	}

	public function store(Request $request)
	{
		$request->validate([
		'title' => 'required',
		'content' => 'required',
		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

		$blog = new Blog;
		$blog->title = $request->title;
		$blog->content = $request->content;
		$blog->tag_id = $request->tag_id;
		$blog->created_by = auth()->user() ? auth()->user()->id : 1;
		$blog->save();

		if ($request->file('image')) 
        {
            $fileName = time().''.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            $blog->image = time().''.$request->image->getClientOriginalName();
            $blog->save();
        }

		return redirect('blog')->with('success', 'Added Successfully');
	}

	public function show($id)
	{
		$blog = Blog::leftjoin('tags as t', 't.id', 'blogs.tag_id')
					->leftjoin('users as u', 'u.id', 'blogs.created_by')
					->select('blogs.*', 't.name', 'u.name as author_name')->findOrFail($id);;

		return view('blog.show', compact('blog'));
	}

	public function edit(Request $request, $id)
	{
		$blog = Blog::leftjoin('tags as t', 't.id', 'blogs.tag_id')
					->leftjoin('users as u', 'u.id', 'blogs.created_by')
					->select('blogs.*', 't.name', 'u.name as author_name')->findOrFail($id);

		$tags = Tag::get();

		
		return view('blog.edit', compact('blog', 'tags'));
	}

	public function update(Request $request, $id)
	{
		$request->all();

		$request->validate([
		'title' => 'required',
		'content' => 'required',
		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

		$blog = Blog::findOrFail($id);
		$blog->title = $request->title;
		$blog->content = $request->content;
		$blog->tag_id = $request->tag_id;
		$blog->save();

		if ($request->file('image')) 
        {
            $fileName = time().''.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            $blog->image = time().''.$request->image->getClientOriginalName();
            $blog->save();
        }

		return redirect()->back()->with('success', 'Updated Successfully');
	}

	public function destroy($id)
	{
		$blog = Blog::find($id);
		$blog->update([
			'is_deleted' =>true,
			'deleted_by' =>auth()->user()->id ?? 1,
			'deleted_at' =>now()
		]);

		return redirect()->back()->with('success', 'Deleted Successfully');	
	}

}
