<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function index()
    {   
        $values = Blog::all();
        $blogs = DB::table('blogs')->get();
        dd($blogs);
        return view('blogs.blog',compact('values'));
    }
}
