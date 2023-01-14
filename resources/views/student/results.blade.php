@extends('layouts.admin')
@section('content')
    <h1>{{ trans('cruds.testResult.title') }}</h1>
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-512">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"> {{ trans('cruds.course.title') }}</th>
                <th scope="col"> {{ trans('cruds.test.title_singular') }}</th>
                <th scope="col">{{ trans('global.additional.result') }}</th>
                <th scope="col">{{ trans('global.additional.date') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $testResult)
                <tr>
                    <td>{{ $testResult->test->course->title }}</td>
                    <td>{{ $testResult->test->title }}</td>
                    <td>{{ $testResult->score }}/{{ $testResult->question_count }}</td>
                    <td>{{ $testResult->human_readable_date_full }} (<b>{{ $testResult->human_readable_date }}</b>)</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
