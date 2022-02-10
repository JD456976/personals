<?php

namespace App\Http\Controllers;

use App\Events\ReportReceivedEvent;
use App\Http\Requests\ReportStoreRequest;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    /**
     * @param \App\Http\Requests\ReportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportStoreRequest $request, $id)
    {
        $report = new Report();
        $post = Post::find($id);;

        $report->reason = $request->reason;
        $report->comment = $request->comment;
        $report->user_id = Auth::user()->id;
        $report->is_resolved = 0;

        $post->reports()->save($report);

        event(new ReportReceivedEvent($report));

        Alert::success('Success!', 'Report successfully submitted');

        return redirect()->back();
    }
}
