<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
class PostsController extends Controller
{
    //

    public function show(Post $post){

        return view('blog.show')->with('post',$post);
    }

    public function category(Category $category){



        return view('blog.category')
            ->with('category',$category)
            ->with('posts',$category->posts()->searched()->simplePaginate(6))
            ->with('categories',Category::all())
            ->with('tags',Tag::all());
    }

    public function tag(Tag $tag){



        return view('blog.tag')
            ->with('tag',$tag)
            ->with('posts',$tag->posts()->searched()->simplePaginate(6))
            ->with('categories',Category::all())
            ->with('tags',Tag::all());
    }
}
