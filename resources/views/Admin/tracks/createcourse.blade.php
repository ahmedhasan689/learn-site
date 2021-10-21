@extends('layouts.app', ['activePage' => 'Course-management', 'titlePage' => __('Course Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            <!-- @method('post') -->
            
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Course') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="/admin/tracks/{{ $track->id }}/courses/create" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <!-- Name -->
                    <div class="form-group{{ $errors->has('Title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('Title') ? ' is-invalid' : '' }}" name="title" id="input-name" type="text" placeholder="{{ __('Title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('Title'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('Title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __(' Link') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" input type="text" name="link" id="input-password" placeholder="{{ __('link') }}" required />
                      @if ($errors->has('link'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('link') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                      <select class="form-control" name="status" required>
                          <option value="0">Free</option>
                          <option value="1">Paid</option>
                      </select>
                      @if ($errors->has('status'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Track') }}</label>

                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('track_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="track_id" required>
                          <option value="{{ $track->id }}">{{ $track->name }}</option>
                      </select>
                      @if ($errors->has('track_id'))
                        <span id="email-error" class="error text-danger" for="input-text">{{ $errors->first('track_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-file">{{ __(' Image') }}</label>
                  <div class="col-sm-7">
                      <input class="form-control" input type="file" name="Image" id="input-file" required />
                      @if ($errors->has('Image'))
                        <span id="name-error" class="error text-danger" for="input-file">{{ $errors->first('Image') }}</span>
                      @endif
                  </div>
                </div>



              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Course') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
