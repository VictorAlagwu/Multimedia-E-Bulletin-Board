<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
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
    public function store($bulletin_id, Request $request)
    {
        //
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        $this->validate($request, [
            'message' => 'required',
            'file' => 'file|mimes:' . $all_ext . '|max:' . $max_size
        ]);
        if( $request->hasFile('file') ){
            $post['file'] = $request->file;
            $ext = $post['file']->getClientOriginalExtension();
            $post['filename'] = $post['file']->getClientOriginalName();
            $post['file_ext'] = $this->getType($ext);
            $post['extension'] = $ext;
    
            $dom = new \domdocument();
            $dom->loadHtml($request->message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $post['message'] = $dom->savehtml();
            $post['user_id'] = auth()->id();
            $post['bulletin_id'] = $bulletin_id;
            
            
            $storage = Storage::putFileAs('/public/' . $this->getUserDir() . '/' . $post['file_ext'] . '/', $post['file'], $post['filename']);
            if ($storage) {Post::create($post); }
        }else{
            $dom = new \domdocument();
            $dom->loadHtml($request->message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $post['message'] = $dom->savehtml();
            $post['user_id'] = auth()->id();
            $post['bulletin_id'] = $bulletin_id;

            Post::create($post);
        }
        return back();
       
        
        
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
