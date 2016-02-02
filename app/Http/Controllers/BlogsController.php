<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use Carbon\Carbon;
use Gate;

class BlogsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }
    
    public function index(Request $request) {
        
        $blogs = Blog::published();
        
        if ($request->has('published_at')) {
            $published_at = $request->input('published_at');
            $blogs = $blogs->whereBetween('published_at', array(Carbon::parse($published_at)->startOfMonth(), Carbon::parse($published_at)->endOfMonth()));
        }
        
        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $blogs = $blogs->whereHas('tags', function ($query) use ($tag){
                $query->where('id', $tag);
            });
        }
        
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            $blogs = $blogs->orderBy($sort);
        } else {
            $blogs = $blogs->latest('published_at');
        }
        
        $blogs = $blogs->simplePaginate(2);
        
//        $blogs = Blog::whereHas('tags', function ($query) {
//            $query->where('name', 'general');
//        })->latest('published_at')->published()->simplePaginate(2);
        
        //$blogs = \App\Tag::where('name', 'general')->firstOrFail()->blogs()->latest('published_at')->published()->simplePaginate(2);
        //$blogs = Auth::user()->blogs()->latest('published_at')->published()->simplePaginate(2);
        //$blogs = Blog::latest('published_at')->published()->simplePaginate(2);
        return view('blogs/index', compact('blogs'));
    }
    
    public function show(Blog $blog) {
        return view('blogs/show', compact('blog'));
    }
    
    public function create() {
        $tags = \App\Tag::lists('name', 'id');
        return view('blogs/create', compact('tags'));
    }
    
    public function store(BlogRequest $request) {        
        $this->createBlog($request);
        flash()->overlay('Your blog has been created!', 'Good Job');
        return redirect('blogs');
    }
    
    private function createBlog(BlogRequest $request) {
        $blog = Auth::user()->blogs()->create($request->all());
        $this->syncTags($blog, $request->input('tag_list'));
        return $blog;
    }
    
    private function syncTags(Blog $blog, array $tags) {
        $blog->tags()->sync($tags);
    }
    
    public function edit(Blog $blog) {
        if (Gate::denies('update-post', $blog)) {
            abort(403);
        }
        
        $tags = \App\Tag::lists('name', 'id');
        return view('blogs/edit', compact('blog', 'tags'));
    }
    
    public function update(Blog $blog, BlogRequest $request) {
        $blog->update($request->all());
        $this->syncTags($blog, $request->input('tag_list'));
        flash()->overlay('Your blog has been updated!', 'Good Job');
        return redirect('blogs');
    }
}
