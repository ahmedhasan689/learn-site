@extends('layouts.app', ['activePage' => 'Question-management', 'titlePage' => __('Questions Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('questions.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Question') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <!-- Name -->
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('title') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Answers') }}</label>
                  <div class="col-sm-7">
                    <!-- Answers -->
                    <div class="form-group{{ $errors->has('answers') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('answers') ? ' is-invalid' : '' }}" name="answers" id="input-answers" type="text" required="true" aria-required="true">
                      </textarea>
                      @if ($errors->has('answers'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('answers') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('right_answer') }}</label>
                  <div class="col-sm-7">
                    <!-- Right Answer -->
                    <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" name="right_answer" id="input-right-answer" type="text" placeholder="{{ __('right_answer') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('right_answer'))
                        <span id="name-error" class="error text-danger" for="input_right_answer">{{ $errors->first('right_answer') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Score') }}</label>

                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                      <select class="form-control" name="score" required>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                          <option value="25">25</option>
                          <option value="30">30</option>
                      </select>
                      @if ($errors->has('score'))
                        <span id="score-error" class="error text-danger" for="input-score">{{ $errors->first('score') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Quiz Name') }}</label>

                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="quiz_id" required>
                          <option value="{{ $quiz->id }}">{{ Str::limit($quiz->name, 25) }}</option>
                      </select>
                      @if ($errors->has('quiz_id'))
                        <span id="email-error" class="error text-danger" for="input-text">{{ $errors->first('quiz_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Question') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
