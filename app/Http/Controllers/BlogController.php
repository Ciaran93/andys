<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class BlogController extends Controller
{
    public function index(){

        $blogPosts = self::getAllBlogPosts();
        return view('admin.blog.blog', compact('blogPosts'));
    }

    public function add(Request $request){

        $blogPost = new BlogPost();
        $blogPost->title = $request->title;
        $blogPost->body = $request->body;
        $blogPost->save();
    }

    public function getAllBlogPosts(){
        return BlogPost::all();
    }

    public function getBlogPost($id){
        $blogPost = BlogPost::findOrFail($id);
        return view('home.blog.blogpost', compact('blogPost'));
    }
}
