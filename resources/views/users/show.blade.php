@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans_choice('views.users', 1) }}</div>

                <div class="card-body">
                    
                    <div class="form">

                        @include('users._form')

                        <a class="float-right" href="{{ route('users.index') }}">
                            {{ __('views.back_to') }}
                            {{ trans_choice('views.users', 2) }}
                        </a>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection