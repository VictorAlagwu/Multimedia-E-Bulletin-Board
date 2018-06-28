<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bulletin;
use App\Userbulletin;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin']);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBulletin($id)
    {
        //
        $bulletin = Bulletin::findOrFail($id);
        $bulletin->posts()->delete();
        $bulletin->userbulletins()->delete();
        $bulletin->delete();
        return redirect('/bulletins');
        
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

    /**
     * Delete User Function
     */

     public function deleteUser($id)
     {
        $user = User::findOrFail($id);
        $user->userbulletins()->delete();
        $user->delete();

        return redirect('/admin');
     }
}
