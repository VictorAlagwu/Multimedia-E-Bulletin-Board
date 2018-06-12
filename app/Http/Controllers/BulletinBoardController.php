<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Bulletin;
use App\Userbulletin;

class BulletinBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];

    public function index()
    {
        //
        $bulletins = Bulletin::latest();

        return view('bulletin.index', [
            'bulletins'=>$bulletins->paginate(4)
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
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'file' => 'file|mimes:' . $all_ext . '|max:' . $max_size
        ]);
       
        if( $request->hasFile('file') ){
            $bulletin['file'] = $request->file;
            $ext = $bulletin['file']->getClientOriginalExtension();
            $bulletin['file_ext'] = $this->getType($ext);
            $bulletin['extension'] = $ext;
            $dom = new \domdocument();
            $dom->loadHtml($request->subject, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $bulletin['subject'] = $dom->savehtml();


            $bulletin['title'] = $request->title;
            $bulletin['slug'] = str_slug($request->title, '-');
            $bulletin['user_id'] = auth()->id();
            
            if (Storage::putFileAs('/public/' . $this->getUserDir() . '/' . $bulletin['file_ext'] . '/', $bulletin['file'], $request['title'] . '.' . $ext)) {
                Bulletin::create($bulletin);
            }
        }else{
           
            $dom = new \domdocument();
            $dom->loadHtml($request->subject, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $bulletin['subject'] = $dom->savehtml();


            $bulletin['title'] = $request->title;
            $bulletin['slug'] = str_slug($request->title, '-');
            $bulletin['user_id'] = auth()->id();
            Bulletin::create($bulletin);
            
        }
        

        
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
        if(auth()->check()){
            $bulletin = Bulletin::where(['id' => $id,'slug' => $slug])->first();

            $user = Userbulletin::where('user_id', auth()->id())
                                ->where('bulletin_id', $id)
                                ->where('subscribe', 1)
                                ->first();
            if($user || Auth::user()->status == 'admin' || Auth::user()->status == 'superadmin'){
                return view('bulletin.show', ['bulletin' => $bulletin, 'posts' => $bulletin->posts()->paginate(5)]);      
            }else{
                return redirect('/bulletins');
            }
            
        }else{
            return redirect('/login');
        }
     
        
        
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


     /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }

    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    private function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    private function getUserDir()
    {
        return Auth::user()->name . '_' . Auth::id();
    }
}
