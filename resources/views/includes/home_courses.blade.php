<div class="text-header">
                <h4>Resume Course</h4>
                <a href="/mycourses">
                My Courses
            </a>
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner mdb-lightbox" role="listbox">
        <div class="mdb-lightbox-ui"></div>
        
        @foreach ($user_courses as $course)
        <div class="carousel-item <?php if($loop->first) echo 'active' ?> text-center">
            <!-- <div class="text-header">
                <h4>Resume Course</h4>
                <a href="/mycourses">
                My Courses
            </a>
        </div> -->
        <div class="row">
            <div class="col-sm-8">
                <figure class="col-md-4 d-md-inline-block">
                    <a class="carousel-control-prev left-arrow" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next right-arrow" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <a href="#">
                        @if ($course->photo)
                        <img src="/images/{{ $course->photo->filename }}" width="700px">
                        @else
                        <img src="/images/default.jpg" width="700px">
                        @endif
                    </a>
                </figure>
            </div>
            <div class="col-sm">
                <a href="#"><h3>{{ $course->title }}</h3></a>
                <br>
                <a href="#"><h4>{{ $course->track->name }}</h4></a>
            </div>
        </div>
            

        </div>
        @endforeach

    </div>
</div>


