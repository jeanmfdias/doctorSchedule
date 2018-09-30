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
                        <table id="schedules-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('validation.attributes.id') }}</th>
                                    <th>{{ __('validation.attributes.date_time') }}</th>
                                    <th>{{ __('validation.attributes.patient_id') }}</th>
                                    <th>{{ __('validation.attributes.doctor_id') }}</th>
                                    {{-- <th>{{ __('views.has_exams') }}</th> --}}
                                    <th>{{ __('validation.attributes.status') }}</th>
                                    <th>{{ trans_choice('views.actions', 2) }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection