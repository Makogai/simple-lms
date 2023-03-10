@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.id') }}
                        </th>
                        <td>
                            {{ $notification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.title') }}
                        </th>
                        <td>
                            {{ $notification->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.text') }}
                        </th>
                        <td>
                            {!! $notification->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.course') }}
                        </th>
                        <td>
                            {{ $notification->course->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection