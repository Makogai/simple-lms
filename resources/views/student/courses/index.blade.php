@extends('layouts.admin')
@section('content')

<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-562">
    <div class="row">
        @if(count($courses) > 0)
        @foreach($courses as $course)
            @php
            if (!$course->thumbnail->isEmpty()) {
                $thumbnail = $course->thumbnail[0]->preview_url;
            } else {
                $thumbnail = asset('imgs/courseph.jpg');
            }
        @endphp
            <div class="col-12 col-md-4">
            <div class="card" style=""><img class="card-img-top h-25" src="{{$thumbnail}}" alt="" style="object-fit: cover; height: 200px!important;">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                    <a class="btn btn-primary" href="{{ route('learn.courses.show', $course->id) }}">{{ trans('global.additional.openCourse') }}</a>
                </div>
            </div>
            </div>
        @endforeach

        @else
            <div class="d-flex mx-auto flex-column justify-content-center">
                <h1 class="text-center">{{ trans('global.additional.noCourses') }}</h1>
                <img src="{{asset("imgs/nocourses.svg")}}" class="h-50" alt="">
            </div>

        @endif

    </div>
</div>
@endsection
