<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Track;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::orderBy('id', 'desc')->paginate(5);
        return view('admin.tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.tracks.create');
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
            'name' => 'required|min:3|max:50',
        ];
        $this->validate($request, $rules);

        // dd($request->all());
        if (Track::create($request->all())) {
            return redirect()->route('tracks.index')->withStatus('Track Successfully Created');
        }else {
            return redirect()->route('tracks.create')->withStatus('Something Wrong, Try Again');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        // Return All Courses related To This Track ...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('Admin.tracks.edit', compact('track'));
    }


    public function update(Request $request, Track $track)
    {
        $rules = [
            'name' => 'required|min:3|max:50',
        ];

        $this->validate($request, $rules);

        if($request->has('name')) {
            $track->name = $request->name;
        }

        // Check If The Value Changed By IsDirty...
        if($track->isDirty()){
            $track->save();
            return redirect()->route('tracks.index')->withStatus('Track Successfully Updated');
        }else{
            return redirect()->route('tracks.index')->withStatus('Nothing To Update');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
      $track->delete();

      return redirect()->route('tracks.index')->withStatus(__('Track successfully deleted.'));
    }
}
