@extends('layouts.app', ['activePage' => 'Course-management', 'titlePage' => __('Course Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('videos.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Preview Course') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                    <div class="row" style="margin: 30px 0; background-color: #cacaca; padding: 15px 5px">
                    <div class="col-sm-6">
                        <div class="course-image">
                            @if($course->photo)
                            <img class="img-fluid" src="/images/{{ $course->photo->filename }}" alt="">
                            @else
                            <img class="img-fluid" src="/images/default.jpg" alt="">
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="course-info">
                            
                            <h3>
                                <strong>Title Of Course : </strong><br> {{ Str::limit($course->title, 25) }}
                            </h3>
                            
                            <strong>Track Name : </strong><br>
                            <h5>
                                <a href="/admin/tracks/{{ $course->track->id }}"> {{ $course->track->name }}</a>
                            </h5>

                            <strong>Status : </strong><br>
                            <span class="{{ $course->status == 0 ? 'text-success' : 'text-danger' }}" style="font-weight: bold">
                            {{ $course->status == 0 ? 'Free' : 'Paid' }}
                            </span>

                        </div>

                    </div>
                    </div>
                    <div class="table-responsive" style="margin: 20px 0;">
                        <div style="margin: 15px;" class="row">
                            <div class="col-6">
                                <h3>{{ __('Course Videos') }}</h3>
                            </div>
                            
                            <div class="row" style="margin-left: 240px; margin-top: 15px;">
                                <div class="col-2 offset-1">
                                    <div class="text-right">
                                        <a href="/admin/courses/{{ $course->id }}/videos/create" class="btn btn-sm btn-primary">{{ __('Add New Video') }}</a>
                                    </div>
                                </div>                      

                                <div class="offset-1 col-2">
                                    <div class="text-right" style="margin-left: 45px;">
                                        <a href="/admin/courses/{{ $course->id }}/quizzes/create" class="btn btn-sm btn-primary">{{ __('Add New Quiz') }}</a>
                                    </div>  
                                </div>
                            </div>
                            
                                                
                        </div>
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                {{ __('Title') }}
                            </th>
                            <th>
                                {{ __('Creation date') }}
                            </th>
                            <th>
                                {{ __('Updating date') }}
                            </th>
                            <th>
                                {{ __('Action') }}
                            </th>
                            </thead>
                            <tbody>
                            @foreach($course->videos as $video)
                                <tr>
                                <td title="{{ $video->title }}">
                                    <a href="/admin/videos/{{ $video->id }}">{{ Str::limit($video->title, 50) }}</a>
                                </td>
                                <td>
                                    {{ $video->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $video->updated_at->diffForHumans() }}
                                </td>
                            
                                <td class="td-actions text-right">
                                    <form action="{{ route('videos.destroy', $video) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('videos.edit', $video) }}" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this video?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">close</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </form>

                                    
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    


            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
