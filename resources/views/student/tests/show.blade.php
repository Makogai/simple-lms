@extends('layouts.admin')
@section('content')

<h1>{{ $test->title  }}</h1>
<hr>

<form method="POST" action="{{ route("learn.test.store") }}">
    @csrf
    <input type="hidden" name="test_id" value="{{ $test->id }}">

    @foreach($test->questions as $question)
        <div class="mb-3">
            <label class="form-label" for="{{ $question->id }}">{{ $question->question_text }}</label>
            @foreach($question->questionOptions as $option)
                <div class="tab-pane p-3 active preview" role="tabpanel" id="ans{{ $option->id }}">
                    <div class="form-check">
                        <input class="form-check-input" id="flexRadioDefault{{$question->id}}{{$option->id}}" type="radio" name="{{$question->id}}" value="{{$option->id}}">
                        <label class="form-check-label" for="flexRadioDefault{{$question->id}}{{$option->id}}">{{ $option->option_text }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

{{--    @foreach($course->lessons as $lesson)--}}
{{--        <h2>{{ trans('cruds.lesson.title')  }}</h2>--}}
{{--    <div class="card mb-4">--}}
{{--        <div class="card-header d-flex justify-content-between">--}}
{{--            <strong>{{ $lesson->title }}</strong>--}}
{{--            <span>{{ $lesson->human_readable_date }}</span>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <p class="text-large-emphasis">{{ $lesson->short_text }}</p>--}}
{{--            <p class="text-large-emphasis">{{ $lesson->long_text }}</p>--}}
{{--            <div class="example">--}}

{{--                @foreach($lesson->file as $key => $media)--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <a href="{{$media->getUrl()}}" class="d-flex gap-1 align-items-center">--}}
{{--                                    <div class="file-icon file-icon-md"--}}
{{--                                         data-type="{{ last(explode('.',$media->file_name)) }}"></div>--}}
{{--                                    <p class="fw-bold h5 pl-2"--}}
{{--                                       style="padding-bottom: 0!important; margin: 0!important;">{{ explode('_',$media->name)[1] }}</p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @endforeach--}}
{{--    @if($test->lessons->count() == 0)--}}
{{--        <div class="d-flex mx-auto flex-column justify-content-center">--}}
{{--            <h1 class="text-center">No lessons found</h1>--}}
{{--            <img src="{{asset("imgs/nocourses.svg")}}" class="" style="height: 200px" alt="">--}}
{{--        </div>--}}
{{--    @endif--}}
@endsection
