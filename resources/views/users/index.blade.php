@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans_choice('views.users', 2) }}</div>

                <div class="card-body">

                    <p>
                        <a class="btn btn-outline-primary" href="{{ route('users.create') }}">
                            {{ __('views.add') }}
                        </a>
                    </p>
                    
                    <div class="table-responsive">
                        <table id="users-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('validation.attributes.id') }}</th>
                                    <th>{{ __('validation.attributes.name') }}</th>
                                    <th>{{ __('validation.attributes.email') }}</th>
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