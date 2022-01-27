<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * @param \App\Http\Requests\ReportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportStoreRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect()->route('back');
    }
}
