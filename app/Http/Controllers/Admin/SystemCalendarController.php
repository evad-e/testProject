<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Booking',
            'date_start' => 'date_start',
            'date_end' => 'date_end',
            'field'      => 'customer_name',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.bookings.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $start = $model->getAttributes()[$source['date_start']];
                $end = $model->getAttributes()[$source['date_end']];
                if (!$start || !$end) {
                    continue;
                }
                
                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $start,
                    'end' => $end,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
