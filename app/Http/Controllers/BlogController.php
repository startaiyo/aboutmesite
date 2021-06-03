<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index()
    {   
        $values = Blog::all();
        return view('blogs.blog',compact('values'));
    }
}
