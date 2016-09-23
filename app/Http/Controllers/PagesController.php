<?php

namespace App\Http\Controllers;

use App\pages;
use Illuminate\Http\Request;
use Session;


class PagesController extends Controller
{
    /* pages CRUD */
    public function PageAdd(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'description' => 'required'
        ]);

        $page = new Pages();
        $page->title = $request['title'];
        $page->description = $request['description'];
        $page->status = $request['status'];
        $page->parent_id = $request['parent'];
//        $page->user_id = 4;
        $request->User()->pages()->save($page);

        return redirect()->route('pages')->with(['message' => 'Page Successfully Added!' . $page->title]);
    }

    public function pages()
    {
        $pages = Pages::orderBy('created_at', 'desc')->get();

        return view('pages.list_pages', ['pages' => $pages]);
    }

    public function PageDelete($page_id)
    {
        $page = Pages::WHERE('id', $page_id)->first();
        $page->delete();

        return redirect()->route('pages')->with(['message' => 'Successfully Deleted  ! ' . $page->title]);
    }

    public function PageEdit($page_id)
    {
        $page = Pages::WHERE('id', $page_id)->get();
        return view('edit-pages.edit', ['pages' => $page]);
    }

    public function PageUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $page = Pages::find($request['page_id']);
        $page->title = $request['title'];
        $page->description = $request['description'];
        $page->status = $request['status'];
        $page->parent_id = $request['parent'];
        $page->update();

        return redirect()->route('pages')->with(['message' => 'Successfully Updated  ! ' . $page->title]);
    }

}
