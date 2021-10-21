<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

use App\Course;
use App\Photo;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(5);
        return view('Admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
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
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $rules = [
            'title'  => 'required|min:15|max:150',
            'status' => 'required|integer|in:0,1',
            'link'   => 'required|url',
            'track_id'   => 'required|integer',
        ];

        $this->validate($request, $rules);

        $course->update($request->all());

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
                if($course->photo){
                    $photo = $course->photo;

                    // Remove The Old Image ... 
                    $filename = $course->photo->filename;
                    // Delete The Image From The Server 
                    unlink('images/' . $filename);

                    $photo->filename = $file_to_store;

                    $photo->save();
                }else{
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\Course',
                    ]);
                }
                

                // dd($photo);

            }



        };
        return redirect()->route('courses.index')->withStatus('Course successfully Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course->photo) {
            $filename = $course->photo->filename;
            // Delete The Image From The Server 
            unlink('images/' . $filename);

        }

        // Delete Course 
        $course->photo->delete();

        
        $course->delete();
        return redirect()->route('courses.index')->withStatus('Course successfully Deleted');

    }
}
