<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_create');
    }

    public function rules()
    {
        return [
            'customer_name' => [
                'string',
                'required',
            ],
            'email_address' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'location' => [
                'string',
                'required',
            ],
            'event_description' => [
                'string',
                'required',
            ],
            'date_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
