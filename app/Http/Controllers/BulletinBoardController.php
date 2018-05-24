<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulletin;

class BulletinBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bulletins = Bulletin::latest()->get();

        return view('bulletin.index', compact('bulletins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bulletin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required'
        ]);

        $dom = new \domdocument();
        $dom->loadHtml($request->subject, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $bulletin['subject'] = $dom->savehtml();
        $bulletin['title'] = $request->title;
        $bulletin['slug'] = str_slug($request->title, '-');
        $bulletin['user_id'] = auth()->id();
        Bulletin::create($bulletin);
        return redirect('/bulletins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        //
        // $bulletin = Bulletin::whereColumn('id',$id,'slug',$slug)->get();
        $bulletin = Bulletin::where(['id' => $id,'slug' => $slug])->first();
        return view('bulletin.show', compact('bulletin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
