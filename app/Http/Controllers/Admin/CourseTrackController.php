<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Track;
use App\Course;
use App\Photo;

class CourseTrackController extends Controller
{
 
    public function index()
    {
        //
    }


    public function create(Track $track)
    {
        return view('admin.tracks.createcourse', compact('track'));
    }

    public function store(Request $request, Track $track)
    {
        $rules = [
            'title'  => 'required|min:15|max:150',
            'status' => 'required|integer|in:0,1',
            'link'   => 'required|url',
            'track_id'   => 'required|integer',
        ];

        $this->validate($request, $rules);

        $course = Course::create($request->all());

        if($file = $request->file('Image')){

            // To Get The File Name
            $filename = $file->getClientOriginalName();
            // To Get The Extension For $filename
            $fileextension = $file->getClientOriginalExtension();

            /* This Wil be Like This : 
               if the Image File Name ( Ahmed.jpg ) 
               $file_to_store => Will Return The Time That Uploaded For ( Ahmed.jpg ) Before The File Name
               ----------
               if The Time Is ( 4852 ) 
               ( Ahmed.jpg )
               time()_Ahmed_.jpg => 4852_Ahmed_.jpg
               This Will Be Unique ...
            */
            $file_to_store = time() . '_' . explode( '.', $filename)[0] . '_.' . $fileextension;


            if ($file->move('images', $file_to_store)) {

                Photo::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $course->id,
                    'photoable_type' => 'App\Course',
                ]);

            }



        };

        if($course){
            return redirect()->route('courses.index')->withStatus('Course successfully Created');
        }           

    }


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
}
