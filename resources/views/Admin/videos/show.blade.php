<!-- <iframe src="https://www.w3schools.com" title="W3Schools Free Online Web Tutorials"></iframe> -->
    <!-- <iframe width="907" height="510" src="https://www.youtube.com/embed/eKuNnpWhm7c?list=PLDoPjvoNmBAw6p0z0Ek0OjPzeXoqlFlCh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

@extends('layouts.app', ['activePage' => 'Video-management', 'titlePage' => __('Video Management')])

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
                <h4 class="card-title">{{ __('Preview Video') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div style="margin:40px 140px 20px">
                    <iframe width="907" height="510" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
