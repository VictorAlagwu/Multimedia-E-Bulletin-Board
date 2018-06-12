<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        return view('profile.index', compact('user'));
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
             'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
          
         ]);
         $profile = User::find(Auth::id());
    

        if($request->hasFile('photo'))
        {
            if($profile->photo != 'nopic.png'){
            
            $path = 'images/profile/'.$profile->photo;
            if(file_exists($path))
            {
                unlink($path);
            }
            }
            
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
