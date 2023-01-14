@extends('layouts.admin')
@section('content')

<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-562">
    <div class="row">
        @if($tests->count() > 0)
        @foreach($tests as $test)
            <div class="col-4">
            <div class="card" style="">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <strong>{{ $test->title }}</strong>
                        <span>{{ $test->human_readable_date }}</span>
                    </div>
                    <p class="card-text">{{ $test->description }}</p>
                    @if($test->has_taken_test)
                        <a href="{{ route('learn.results') }}" class="btn btn-warning">{{ trans('global.additional.viewResults') }}</a>
                    @else
                    <a class="btn btn-primary" href="{{ route('learn.test.show', $test->id) }}">{{ trans('global.additional.openTest') }}</a>
                    @endif
                </div>
            </div>
            </div>
        @endforeach

        @else
            <div class="d-flex mx-auto flex-column justify-content-center">
                <h1 class="text-center">No Tests found</h1>
                <img src="{{asset("imgs/nocourses.svg")}}" class="h-50" alt="">
            </div>

        @endif

    </div>
</div>
@endsection
