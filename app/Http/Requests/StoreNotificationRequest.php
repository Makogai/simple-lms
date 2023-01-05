<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:200',
                'required',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
