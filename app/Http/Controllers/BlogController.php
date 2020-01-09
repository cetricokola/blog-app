<?php

namespace App\Http\Controllers;

use App\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Cache::remember('blogs', 22*60, function() {
            return Blogs::all();
        });
        return view('home', ['blogs' => $blogs]);
    }
    public function create()
    {
       return view('pages.create_blog');
    }
    public function store(Request $request)
    {
       $blog = new Blogs();
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->save();
        Log::info("New blog is created");
        return redirect('/home');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
