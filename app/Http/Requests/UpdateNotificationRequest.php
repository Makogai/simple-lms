<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_edit');
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
