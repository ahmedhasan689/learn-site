<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(5);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {
        return view('admin.videos.create', compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'     => 'required|min:10|max:100',
            'link'      => 'required|url',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);
        $video = Video::create($request->all());
        
        if($video){
            return redirect()->route('videos.index')->withStatus('Video Successfully Created');
        }else{
            return redirect()->route('videos.create')->withStatus('Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'title'     => 'required|min:10|max:100',
            'link'      => 'required|url',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);
        $video->update($request->all());
        
        if($video->update($request->all())){
            return redirect()->route('videos.index')->withStatus('Video Successfully Updated');
        }else{
            return redirect()->route('videos.edit')->withStatus('Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->withStatus('Video Successfully Deleted');

    }
}
