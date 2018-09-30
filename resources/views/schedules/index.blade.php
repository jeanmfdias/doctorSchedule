@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans_choice('views.schedules', 2) }}</div>

                <div class="card-body">

                    <p>
                        <a class="btn btn-outline-primary" href="{{ route('schedules.create') }}">
                            {{ __('views.add') }}
                        </a>
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('validation.attributes.id') }}</th>
                                <th>{{ __('validation.attributes.date_time') }}</th>
                                <th>{{ __('validation.attributes.patient_id') }}</th>
                                <th>{{ __('validation.attributes.doctor_id') }}</th>
                                <th>{{ __('views.has_exams') }}</th>
                                <th>{{ __('validation.attributes.status') }}</th>
                                <th>{{ trans_choice('views.actions', 2) }}</th>
                            </tr>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ date(__('format.date_time'), strtotime($schedule->date_time)) }}</td>
                                    <td>{{ $schedule->patient->name }}</td>
                                    <td>{{ $schedule->doctor->name }}</td>
                                    <td>{{ count(json_decode($schedule->exams)) > 0 ? __('views.yes') : __('views.no') }}</td>
                                    <td>
                                        <span class='badge badge-{{ __("format.schedule_status.$schedule->status") }}'>
                                            {{ __("views.schedule_status.$schedule->status") }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-secondary btn-sm" 
                                                href="{{ route('schedules.show', $schedule->id) }}">
                                                {{ __('views.show') }}
                                            </a>
                                            <a class="btn btn-warning btn-sm" 
                                                href="{{ route('schedules.edit', $schedule->id) }}">
                                                {{ __('views.edit') }}
                                            </a>
                                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    {{ __('views.delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection