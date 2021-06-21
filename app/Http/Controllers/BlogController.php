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

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'delete']);
        // 追加
        $this->middleware('can:update,blog')->only(['edit', 'update']);
        $this->middleware('verified')->only('create');
    }
}
