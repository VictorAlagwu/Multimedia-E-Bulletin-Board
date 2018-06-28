<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userbulletin;

class UserBulletinController extends Controller
{

    public function __construct(){
        $this->middleware('auth', 'admin');
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
            'user_id' => 'required',
            'bulletin_id' => 'required'
        ]);
        $userbulletin['user_id'] = $request->user_id;
        $userbulletin['bulletin_id'] = $request->bulletin_id;
        $userbulletin['subscribe'] = ($request->subscribe  == 'true' ? 1 : 0);
        
        $user = Userbulletin::where('user_id', $userbulletin['user_id'])
                    ->where('bulletin_id', $userbulletin['bulletin_id'])
                    ->first();
        if($user){
            return redirect('/admin');
        }else{
            Userbulletin::create($userbulletin);
            return back();
        }
         
        
    }

}
