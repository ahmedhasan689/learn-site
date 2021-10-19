@extends('layouts.app', ['activePage' => 'Quiz-management', 'titlePage' => __('Quiz Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('quiz.update', $quiz) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PATCH')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Update Quiz') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('quiz.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <!-- Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('name') }}" value="{{ $quiz->name }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
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
                          <?php if($quiz->course->id == $course->id)
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
