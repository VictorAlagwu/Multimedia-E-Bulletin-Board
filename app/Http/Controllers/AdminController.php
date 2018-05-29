<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bulletin;
use App\Userbulletin;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $details = User::all();
        $bulletins = Bulletin::all();
        return view('admin.index', [
            'details'=>$details,
            'bulletins'=>$bulletins
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function bulletinShow($id)
    {
        
        $bulletin = Bulletin::where('id', $id)->first();
        $users = User::all();
        $userbulletins = Userbulletin::where('bulletin_id', $id)->get();

        return view('admin.bulletin', [
            'bulletin' => $bulletin,
            'users' => $users,
            'userbulletins'=>$userbulletins
        ]);
    }
}
