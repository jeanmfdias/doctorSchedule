@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans_choice('views.patients', 1) }}</div>

                <div class="card-body">
                    
                    <form class="form" action="{{ route('patients.update', $patient->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        
                        @include('patients._form')

                        <div class="btn-group" role="group">
                            <button class="btn btn-success" type="submit">{{ __('views.save') }}</button>
                            <button class="btn btn-secondary" type="reset">{{ __('views.reset') }}</button>
                        </div>

                        <a class="float-right" href="{{ route('patients.index') }}">
                            {{ __('views.back_to') }}
                            {{ trans_choice('views.patients', 2) }}
                        </a>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection