@extends('layouts.user_layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="d-flex flex-wrap course-head">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>
                            {{ $course->title }}
                        </h2>
                        <p>{{ $course->description }}</p>
                        <h4>
                            Track :
                            <a href="/tracks/{{ $course->track->name }}">{{ $course->track->name }}</a> 
                            <span style="float: right">
                                <span class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">
                                    {{$course->status == '0' ? 'FREE' : 'PAID'}} 
                                </span>
                                <span>
                                    - {{count(array($course->users))}}
                                </span>
                                <span>
                                    User Enrolled
                                </span>
                            </span>
                        </h4>
                        <a class="btn btn-info justify-content-center p-2" href="/">
                            {{ __('Back To Home Page') }}
                        </a>
                    </div>
                    <div class="col-sm">
                        @if($course->photo)
                        <img class="course-image" src="/images/{{ $course->photo->filename }}" alt="">
                        @else
                        <img class="course-image" src="/images/default.jpg" alt="">
                        @endif
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="videos">
            <div class="row">
                <h4>
                    Course Videos
                </h4>
                <div class="col-sm-12">
                    @if(count($course->videos) > 0)
                        @foreach($course->videos as $video)
                        <div class="video">
                            <a href="{{ $video->link }}" data-toggle="modal" data-target="#show-video">
                               <i class="fab fa-youtube"></i>
                                {{ Str::limit($video->title, 40) }}
                            </a>
                        </div>
                        @endforeach
                    @else
                    <div class="alert alert-danger">
                        <p>
                            This Course Do Not Have Any Videos
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="quizzes">
            <div class="row">
                <h4>
                    Course Quizzes
                </h4>
                <div class="col-sm-12">
                    @if(count($course->quizzes) > 0)
                        @foreach($course->quizzes as $quiz)
                        <div class="quiz">
                                <button class="btn btn-outline-primary">
                                    {{ $quiz->name }}
                                </button>
                        </div>
                        @endforeach
                    @else
                    <div class="alert alert-danger">
                        <p>
                            This Course Do Not Have Any Quizzes
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="show-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe width="907" height="510" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
@endsection()