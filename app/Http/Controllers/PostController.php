<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Stevebauman\Location\Facades\Location;

class PostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('post.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $location = Location::get();
        $categories = Category::pluck('title', 'id')->all();
        return view('post.create', compact('location', 'categories'));
    }

    /**
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        if (Post::postcount() >= 5)
        {
            Alert::error('Ooops', 'You already have 5 posts which are still active');

            return redirect('user.posts');
        }

        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->zipcode = $request->zipcode;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->slug = Str::slug($request->title,);

        $post->save();

        $post->addAllMediaFromTokens();

        Alert::success('Success!', 'Post successfully created');

        return redirect(route('post.index'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        views($post)->cooldown(60)->record();
        $category = Category::where('id', $post->category_id)->first();

        return view('post.show', compact('post','category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        $location = Location::get();
        $categories = Category::pluck('title', 'id')->all();
        return view('post.edit', compact('post', 'location','categories'));
    }

    /**
     * @param \App\Http\Requests\PostUpdateRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->zipcode = $request->zipcode;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        $post->update();

        $post->addAllMediaFromTokens();

        Alert::success('Success!', 'Post successfully renewed');

        return redirect(route('user.posts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    public function filteredPosts($query)
    {
        $category = Category::find($query);
        return view('post.index', compact('query','category'));
    }
}
