
@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Tracks Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Tracks') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Tracks') }}</p>
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
                    <a href="{{ route('tracks.create') }}" class="btn btn-sm btn-primary">{{ __('Add Track') }}</a>
                  </div>
                </div>

                @if(count($tracks))
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                            {{ __('Name') }}
                        </th>
                        <th>
                          {{ __('Creation date') }}
                        </th>
                        <th>
                          {{ __('No. Courses') }}
                        </th>
                        <th>
                          {{ __('No. Users') }}
                        </th>
                        <th class="text-right">
                          {{ __('Actions') }}
                        </th>
                      </thead>
                      <tbody>

                        @foreach($tracks as $track)
                          <tr>
                            <td>
                              {{ $track->name }}
                            </td>
                            <td>
                              {{ $track->created_at->diffForHumans() }}
                            </td>
                            <td>
                              {{ count($track->Courses) }}
                            </td>
                            <td>
                              {{ count(array($track->users)) }}
                            </td>
                            <td class="td-actions text-right">
                                <form action="{{ route('tracks.destroy', $track) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('tracks.edit', $track) }}" data-original-title="" title="">
                                      <i class="material-icons">edit</i>
                                      <div class="ripple-container"></div>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
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
                @else
                  No Track Found
                @endif
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $tracks->links() }}
                    </nav>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
