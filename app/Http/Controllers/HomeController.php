<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $tags = Tag::orderBy('name','asc')->get();
        return view('home',compact('tags'));
    }

    public function posts()
    {   $posts = Post::orderBy('id','desc')->get();
        return view('posts',compact('posts'));
    }

    public function addPost(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        $tags = $request->tag;
        $tagNames = [];        
        if (!empty($tags)) {
            foreach ($tags as $tagName)
            {
                $tag = Tag::firstOrCreate(['name'=>$tagName, 'slug'=>Str::slug($tagName)]);                
                if($tag)
                {
                    $tagNames[] = $tag->id;
                }
            }
            $post->tags()->syncWithoutDetaching($tagNames);
        }

        return redirect()->route('posts')->with('success','Post created successfully');;
    }
}
