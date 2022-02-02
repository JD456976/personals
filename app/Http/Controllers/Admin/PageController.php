<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageStoreRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = Page::all();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.page.create');
    }

    /**
     * @param \App\Http\Requests\Admin\PageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $page = new Page();

        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->is_active = $request->has('is_active');
        $page->main_menu = $request->has('main_menu');
        $page->footer_menu = $request->has('footer_menu');

        $page->save();

        Alert::success('Success!', 'Page Added successfully!');

        return redirect()->route('admin.page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        return view('admin.page.show', compact('page'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * @param \App\Http\Requests\Admin\PageUpdateRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->is_active = $request->has('is_active');
        $page->main_menu = $request->has('main_menu');
        $page->footer_menu = $request->has('footer_menu');

        $page->update();

        Alert::success('Success!', 'Page Updated successfully!');

        return redirect()->route('admin.page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();

        Alert::warning('Success!', 'Page Deleted successfully!');

        return redirect()->route('admin.page.index');
    }
}
