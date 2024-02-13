<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;
    private $category;
    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_categories = $this->category->all();
        return view('users.posts.create')->with('all_categories', $all_categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->post->user_id = Auth::id();
        $this->post->description = $request->description;
        $this->post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        $this->post->save();

        // return $request->category;
        foreach ($request->category as $category_id) {
            $category_post[] = ['category_id' => $category_id];
        }

        // $category_post = [
        // [‘category_id’ => 1],
        // [‘category_id’ => 4]
        // ];

        $this->post->categoryPost()->createMany($category_post);

        // $category_post = [
        //     [‘category_id’ => 1, ‘post_id’ => 2],
        //     [‘category_id’ => 4, ‘post_id’ => 2]
        // ];
        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //


        return view('users.posts.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(Auth::id() != $post->user->id){
            return redirect()->back();
        }
        //
        $selected_categories = [];
        foreach($post->categoryPost as $category_post){
            $selected_categories[] = $category_post->category_id;
        }

        $all_categories = $this->category->all();

        return view('users.posts.edit')
                ->with('all_categories',$all_categories)
                ->with('post',$post)
                ->with('selected_categories',$selected_categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->description = $request->description;
        if($request->image){
            $post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }
        $post->save();

        $post->categoryPost()->delete();

          // return $request->category;
          foreach ($request->category as $category_id) {
            $category_post[] = ['category_id' => $category_id];
        }
        $post->categoryPost()->createMany($category_post);

        return redirect()->route('post.show',$post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('index');
    }
}
