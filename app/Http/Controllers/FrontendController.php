<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $blogs = Blog::with('author')
                    ->search()
                    ->published()
                    ->IsPublished()
                    ->orderBy('published_at','desc')
                    ->simplePaginate(3);

        $categories = Category::withCount('blogs')->get();
        $tags = Tag::limit(10)->get();
        return view('frontend.blogs.index',compact([
            'categories',
            'tags',
            'blogs'
        ]));
    }

    public function category(Category $category) {
        $blogs = $category->blogs()->search()->published()->simplePaginate(3);
        $categories = Category::withCount('blogs')->get();
        $tags = Tag::limit(10)->get();
        return view('frontend.blogs.index',compact([
            'categories',
            'tags',
            'blogs'
        ]));
    }

    public function tag(Tag $tag) {
        $blogs = $tag->blogs()->search()->published()->simplePaginate(2);
        $categories = Category::withCount('blogs')->get();
        $tags = Tag::limit(10)->get();
        return view('frontend.blogs.index',compact([
            'categories',
            'tags',
            'blogs'
        ]));
    }

    public function show(Blog $blog) {
        // dd($blog);
        $blogTags = $blog->tags;
        $categories = Category::withCount('blogs')->get(); # for sidebar
        $comments = Comment::all();
        // dd($comments);

        $tags = Tag::limit(10)->get(); # for sidebar
        return view('frontend.blogs.blog',compact([
            'categories',
            'tags',
            'blog',
            'blogTags',
            'comments',
        ]));
    }
}
