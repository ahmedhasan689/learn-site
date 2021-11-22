<div class="container">
    <div class="famous_courses">
        <?php $i = 0;  ?>
        @foreach ($tracks as $track)
        <h4>Last {{ $track->name }} In Site</h4>

        <div class="row">
            @foreach($track->courses()->get() as $course)
            <div class="col-sm-3">
                <div class="track_course">
                    <a href="/courses/{{$course->slug}}">
                        @if($course->photo)
                        <img src="/images/{{ $course->photo->filename }}" alt="name">
                        @else
                        <img src="/images/default.jpg" alt="name">
                        @endif
                    </a>
                    <h6>
                        <a href="/courses/{{$course->slug}}">{{ \Str::limit($course->title, 15) }}</a>
                        <br>
                        <div style="margin-top: 8px">
                            <span class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">
                                {{ $course->status == '0' ? 'FREE' : 'PAID' }}
                            </span>                     
                            <span style="float: right;">Users: {{ count(array($course->users)) }}</span>
                        </div>
                    </h6>
                </div>
            </div>
            @endforeach

            @if($i == 1)
            <div class="famous_courses">
                <h4>
                    Famous Topic For You
                </h4>
                <div class="tracks">
                    <ul class="list-unstyled">
                        @foreach($famous_tracks as $track)
                        <li>
                            <a class="btn btn-secondary" href="#">{{ $track->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
            @endif

            @if($i == 2)
            <div class="recommended_courses">
                <h4>
                    Recommended Courses For You
                </h4>
                <div class="courses">

                        @foreach($recommended_courses as $course)
                        <div class="course">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="course-img">
                                        @if ($course->photo)
                                        <img src="/images/{{ $course->photo->filename }}" width="150" height="100">
                                        @else
                                        <img src="/images/default.jpg" width="150" height="100">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="course-details">
                                        <p class="course-title">
                                            {{ Str::limit($course->title, 25) }}
                                        </p>
                                        <span class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">
                                            {{ $course->status == '0' ? 'FREE' : 'PAID' }}
                                        </span>                     
                                        <span style="float: right;">Users: {{ count(array($course->users)) }}</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach            
                </div>
            </div>

            @endif
        </div>

        <?php $i++;  ?>

        @endforeach
    </div>
</div>