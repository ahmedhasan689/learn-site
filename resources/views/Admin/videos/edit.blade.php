@extends('layouts.app', ['activePage' => 'Video-management', 'titlePage' => __('Video Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('videos.update', $video) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PATCH')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Video') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <!-- Name -->
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-name" type="text" placeholder="{{ __('title') }}" value="{{ $video->title }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Link') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="input-email" type="text" placeholder="{{ __('link') }}" value="{{ $video->link }}" required />
                      @if ($errors->has('link'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('link') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Course') }}</label>

                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="course_id" required>
                          @foreach(\App\Course::orderBy('id', 'desc')->get() as $course)
                          
                          <option 
                          <?php if($video->course->id == $course->id)
                              echo 'selected';
                          
                          ?>
                          value="{{ $course->id }}">{{ Str::limit($course->title, 25) }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('course_id'))
                        <span id="email-error" class="error text-danger" for="input-text">{{ $errors->first('course_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Video') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
