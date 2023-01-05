@extends('layouts.admin')
@section('content')
    <h1>Test results</h1>
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-512">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Course</th>
                <th scope="col">Test</th>
                <th scope="col">Result</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $testResult)
                <tr>
                    <td>{{ $testResult->test->course->title }}</td>
                    <td>{{ $testResult->test->title }}</td>
                    <td>{{ $testResult->score }}/{{ $testResult->test->questions_count }}</td>
                    <td>{{ $testResult->human_readable_date_full }} (<b>{{ $testResult->human_readable_date }}</b>)</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
