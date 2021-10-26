@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">trending_up</i>
              </div>
              <p class="card-category">Tracks</p>
              <h3 class="card-title"><a href="/admin/tracks" style="color: #fd9710">{{ $tracks_count }}</a>
                <small>Tracks</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="/admin/tracks"><small>View Quizzes In Site</small></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">school</i>
              </div>
              <p class="card-category">Courses</p>
              <h3 class="card-title">
                <a href="/admin/courses" style="color: #50aa54">{{ $courses_count }}</a>
                <small>Course</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="/admin/courses"><small>All Courses In Site</small></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">group</i>
              </div>
              <p class="card-category">Users</p>
              <h3 class="card-title">
                <a href="/admin/users" style="color: #e9433f">{{ $users_count }}</a>
                <small>Users</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              <a href="/admin/users"><small>All Users In Site</small></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">quiz</i>
              </div>
              <p class="card-category">Quizzes</p>
              <h3 class="card-title">
                <a href="/admin/quiz" style="color: #0fb6cb">{{ $quizzes_count }}</a>
                <small>Quizzes</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="/admin/quiz"><small>All Quizzes In Site</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            
          <div class="card card-chart"> 
            <div class="card-header card-header-tabs card-header-primary" style="background: linear-gradient(60deg, #ec9f39, #ecc34e)">
              <h4 style="font-weight: bolder;">Tracks :</h4>
              <h6 style="font-weight: 300;">Last Tracks In Site</h6> 
            </div>        
            @if(count($tracks))
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                            {{ __('Name') }}
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
                             <a href="{{ route('tracks.show', $track) }}">{{ $track->name }}</a> 
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
            
          </div>
        </div>
        <div class="col-md-6">
          
          <div class="card card-chart">
            <div class="card-header card-header-tabs card-header-primary" style="background: linear-gradient(60deg, #50aa54, #36c261)">
              <h4 style="font-weight: bolder;">Courses :</h4>
              <h6 style="font-weight: 300;">Last Courses In Site</h6> 
            </div>
            @if(count($courses))
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                            {{ __('Name') }}
                        </th>
                       
                        <th>
                          {{ __('No. Users') }}
                        </th>
                        <th>
                          {{ __('Track Name') }}
                        </th>
                        <th class="text-right">
                          {{ __('Actions') }}
                        </th>
                      </thead>
                      <tbody>

                        @foreach($courses as $course)
                          <tr>
                            <td title="{{ $course->title }}">
                             <a href="{{ route('courses.show', $course) }}">{{ Str::limit($course->title, 15) }}</a> 
                            </td>  
                            <td>
                              {{ count(array($course->users)) }}
                            </td>
                            <td>
                              {{ $course->track->name }}
                            </td>
                            <td class="td-actions text-right">
                                <form action="{{ route('courses.destroy', $course) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('courses.edit', $track) }}" data-original-title="" title="">
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
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary" style="background: linear-gradient(60deg, #e9433f, #e4453d)">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <h4 style="font-weight: bolder;">Users :</h4>
                  <h6 style="font-weight: 300;">Last Users In Site</h6>                 
                </div>
              </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Verified') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ Str::limit($user->email, 10) }}
                          </td>
                          <td>
                            <?php if ($user->email_verified_at){
                              echo '<div class="text-success">Verified</div>';
                            }else{
                              echo '<div class="text-danger">Not Verified</div>';
                            }
                            ?>
                          </td>

                          <td class="td-actions text-right">
                            @if ($user->id != auth()->id())
                              <form action="{{ route('users.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('users.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning" style="background: linear-gradient(60deg, #0fb6cb, #388dd6)">
              <h4 style="font-weight: bolder;">Quizzes :</h4>
              <h6 style="font-weight: 300;">Last Quizzes In Site</h6> 
            </div>
            <div class="card-body">
            <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                          {{ __('No.Question') }}
                      </th>
                      <th>
                        {{ __('Course Name') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($quizzes as $quiz)
                        <tr>
                          <td>
                            <a href="{{ route('quiz.show', $quiz) }}">{{ Str::limit($quiz->name, 10) }}</a>
                          </td>
                          <td>
                            {{ count($quiz->questions) }}
                          </td>
                          <td>
                            {{ Str::limit($quiz->course->title, 10) }}
                          </td>
                          <td class="td-actions text-right">

                              <form action="{{ route('quiz.destroy', $quiz) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('quiz.edit', $quiz) }}" data-original-title="" title="">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush