<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bulletin;
use App\Userbulletin;
use Auth;
class ProfileController extends Controller
{
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $bulletins = Bulletin::where('user_id', $id)->get();
        $userbulletins = Userbulletin::where(['user_id'=>$id, 'subscribe' => 1])->get();
        return view('profile.index', compact('user', 'bulletins', 'userbulletins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

     	$this->validate($request,
         [
             'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
          
         ]);
         $profile = User::find(Auth::id());
    

        if($request->hasFile('photo'))
        {
            
            
            $path = 'images/profile/'.$profile->photo;
            
            $profile['photo'] = uniqid().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move('images/profile',$profile['photo']);
        }
  
      
        $profile->save();
    
      return back()->with('success', 'Profile  Updated Successfully!');
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
