
@extends('layouts.app', ['activePage' => 'Course-management', 'titlePage' => __('Courses Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Courses') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Courses') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">{{ __('Add Course') }}</a>
                  </div>
                </div>

                @if(count($courses))

                <div class="row">
                    @foreach ($courses as $course)
                    <div class="col-sm-3">
                      <div class="card" style="width: 18rem;">
                          @if($course->photo)
                          <img height="250" width="150" src="/images/{{ $course->photo->filename }}" class="card-img-top">
                          @else
                          <img height="150" width="150" src="/images/2.jpg" class="card-img-top" alt="Course Photo">
                          @endif
                          <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($course->title, 100) }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <form method="POST" action="{{ route('courses.destroy', $course) }}">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">Show</a>
                                <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletecourse">
                            </form>
                            
                            
                            <!-- <a href="/admin/courses/edit" class="btn btn-success btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a> -->
                          </div>
                          
                      </div>
                    </div>
                    @endforeach
                </div>

                @else
                  No Courses Found
                @endif
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $courses->links() }}
                    </nav>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
