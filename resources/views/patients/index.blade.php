@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans_choice('views.patients', 2) }}</div>

                <div class="card-body">

                    <p>
                        <a class="btn btn-outline-primary" href="{{ route('patients.create') }}">
                            {{ __('views.add') }}
                        </a>
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('validation.attributes.id') }}</th>
                                <th>{{ __('validation.attributes.name') }}</th>
                                <th>{{ __('validation.attributes.cpf') }}</th>
                                <th>{{ trans_choice('views.actions', 2) }}</th>
                            </tr>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->cpf }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-secondary btn-sm" 
                                                href="{{ route('patients.show', $patient->id) }}">
                                                {{ __('views.show') }}
                                            </a>
                                            <a class="btn btn-warning btn-sm" 
                                                href="{{ route('patients.edit', $patient->id) }}">
                                                {{ __('views.edit') }}
                                            </a>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="post">
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