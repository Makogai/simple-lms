@extends('layouts.admin')
@section('content')
    <style>
        figure img {
            width: auto!important;
        }
        /*! fileicon.css v0.1.1 | MIT License | github.com/picturepan2/fileicon.css */
        /* fileicon.basic */
        .file-icon {
            font-family: Arial, Tahoma, sans-serif;
            font-weight: 300;
            display: inline-block;
            width: 24px;
            height: 32px;
            background: #018fef;
            position: relative;
            border-radius: 2px;
            text-align: left;
            -webkit-font-smoothing: antialiased;
        }

        .file-icon::before {
            display: block;
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-bottom-left-radius: 2px;
            border-width: 5px;
            border-style: solid;
            border-color: #fff #fff rgba(255, 255, 255, .35) rgba(255, 255, 255, .35);
        }

        .file-icon::after {
            display: block;
            content: attr(data-type);
            position: absolute;
            bottom: 0;
            left: 0;
            font-size: 10px;
            color: #fff;
            text-transform: lowercase;
            width: 100%;
            padding: 2px;
            white-space: nowrap;
            overflow: hidden;
        }

        /* fileicons */
        .file-icon-xs {
            width: 12px;
            height: 16px;
            border-radius: 2px;
        }

        .file-icon-xs::before {
            border-bottom-left-radius: 1px;
            border-width: 3px;
        }

        .file-icon-xs::after {
            content: "";
            border-bottom: 2px solid rgba(255, 255, 255, .45);
            width: auto;
            left: 2px;
            right: 2px;
            bottom: 3px;
        }

        .file-icon-sm {
            width: 18px;
            height: 24px;
            border-radius: 2px;
        }

        .file-icon-sm::before {
            border-bottom-left-radius: 2px;
            border-width: 4px;
        }

        .file-icon-sm::after {
            font-size: 7px;
            padding: 2px;
        }

        .file-icon-lg {
            width: 48px;
            height: 64px;
            border-radius: 3px;
        }

        .file-icon-lg::before {
            border-bottom-left-radius: 2px;
            border-width: 8px;
        }

        .file-icon-lg::after {
            font-size: 16px;
            padding: 4px 6px;
        }

        .file-icon-xl {
            width: 96px;
            height: 128px;
            border-radius: 4px;
        }

        .file-icon-xl::before {
            border-bottom-left-radius: 4px;
            border-width: 16px;
        }

        .file-icon-xl::after {
            font-size: 24px;
            padding: 4px 10px;
        }

        /* fileicon.types */
        .file-icon[data-type=zip],
        .file-icon[data-type=rar] {
            background: #acacac;
        }

        .file-icon[data-type^=doc] {
            background: #307cf1;
        }

        .file-icon[data-type^=xls] {
            background: #0f9d58;
        }

        .file-icon[data-type^=ppt] {
            background: #d24726;
        }

        .file-icon[data-type=pdf] {
            background: #e13d34;
        }

        .file-icon[data-type=txt] {
            background: #5eb533;
        }

        .file-icon[data-type=mp3],
        .file-icon[data-type=wma],
        .file-icon[data-type=m4a],
        .file-icon[data-type=flac] {
            background: #8e44ad;
        }

        .file-icon[data-type=mp4],
        .file-icon[data-type=wmv],
        .file-icon[data-type=mov],
        .file-icon[data-type=avi],
        .file-icon[data-type=mkv] {
            background: #7a3ce7;
        }

        .file-icon[data-type=bmp],
        .file-icon[data-type=jpg],
        .file-icon[data-type=jpeg],
        .file-icon[data-type=gif],
        .file-icon[data-type=png] {
            background: #f4b400;
        }

        .bg-primary-light {
            background-color: #e9eaf8 !important;
        }

        table {
            width: 100%;
            /*border: 2px solid #ddd;*/
            padding: 5px;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table td {
            padding: 5px;
            text-align: left;
        }

        /*Add small screens media query*/


        #example_wrapper {
            max-width: 100%;
            width: 100%;
            overflow: scroll;
        }
    </style>
<h1>{{ $course->title  }}</h1>
<hr>

    @if($course->notifications->count() > 0)
        <div class="alert alert-warning">
            <h3>{{ trans('cruds.notification.title')  }}</h3>
                @foreach($course->notifications as $notification)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <strong>{{ $notification->title }}</strong>
                        <span>{{ $notification->human_readable_date }}</span>
                    </div>
                    <div class="card-body">
                        <p class="text-large-emphasis">{!! $notification->text !!}</p>
                    </div>
                </div>
                @endforeach
        </div>
    @endif

    @foreach($course->lessons as $lesson)
        <h2>{{ trans('cruds.lesson.title')  }}</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <strong>{{ $lesson->title }}</strong>
            <span>{{ $lesson->human_readable_date }}</span>
        </div>
        <div class="card-body">
            <p class="text-large-emphasis">{{ $lesson->short_text }}</p>
            <p class="text-large-emphasis">{{ $lesson->long_text }}</p>
            <div class="example">

                @foreach($lesson->file as $key => $media)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{$media->getUrl()}}" class="d-flex gap-1 align-items-center">
                                    <div class="file-icon file-icon-md"
                                         data-type="{{ last(explode('.',$media->file_name)) }}"></div>
                                    <p class="fw-bold h5 pl-2"
                                       style="padding-bottom: 0!important; margin: 0!important;">{{ explode('_',$media->name)[1] }}</p>
                                </a>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    @if($course->lessons->count() == 0)
        <div class="d-flex mx-auto flex-column justify-content-center">
            <h1 class="text-center">No lessons found</h1>
            <img src="{{asset("imgs/nocourses.svg")}}" class="" style="height: 200px" alt="">
        </div>
    @endif
@endsection
