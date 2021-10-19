
@extends('layouts.app', ['activePage' => 'Video-management', 'titlePage' => __('Video Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Video') }}</h4>
                <p class="card-category"> {{ __('Here you can manage videos') }}</p>
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
                    <a href="{{ route('videos.create') }}" class="btn btn-sm btn-primary">{{ __('Add Video') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Title') }}
                      </th>
                      <th>
                        {{ __('Course Name') }}
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
                      @foreach($videos as $video)
                        <tr>
                          <td title="{{ $video->title }}">{{ Str::limit($video->title, 50) }}</td>
                          <td>
                           <a href="/admin/courses/{{ $video->course->id }}">{{ Str::limit($video->course->title, 50) }}</a> 
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
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $videos->links() }}
                    </nav>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
