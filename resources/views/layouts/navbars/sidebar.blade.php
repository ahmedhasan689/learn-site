<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('E-Learning') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <!-- If Your Email = hlhatab@gmail.com -->
      @if(strtolower(auth()->user()->email) == 'hlhatab@gmail.com')

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'Admin-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">admin_panel_settings</i>
          <p>{{ __('Admin') }}
            <b class="caret"></b>
          </p>
        </a>

        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admins.create') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('New Admin') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="{{ route('admins.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Admin Management') }} </span>
              </a>
            </li>
          </ul>
        </div>

      </li>

      @endif
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#User">
          <i class="material-icons">group</i>
          <p>{{ __('Users') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="User">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('users.create') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('New User') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management'}}">
              <a class="nav-link" href="{{ route('users.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Users Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/admin/tracks">
          <i class="material-icons">trending_up</i>
            <p>{{ __('Tracks') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('courses.index') }}">
          <i class="material-icons">school</i>
            <p>{{ __('Courses') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('videos.index') }}">
          <i class="material-icons">play_circle_filled</i>
            <p>{{ __('Videos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('quiz.index') }}">
          <i class="material-icons">quiz</i>
          <p>{{ __('Quizzes') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('questions.index') }}">
          <i class="material-icons">question_answer</i>
            <p>{{ __('Questions') }}</p>
        </a>
      </li>
     


    </ul>
  </div>
</div>
