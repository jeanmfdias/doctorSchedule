@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans_choice('views.doctors', 2) }}</div>

                <div class="card-body">

                    <p>
                        <a class="btn btn-outline-primary" href="{{ route('doctors.create') }}">
                            {{ __('views.add') }}
                        </a>
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('validation.attributes.id') }}</th>
                                <th>{{ __('validation.attributes.name') }}</th>
                                <th>{{ __('validation.attributes.crm') }}</th>
                                <th>{{ trans_choice('views.actions', 2) }}</th>
                            </tr>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->crm }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-secondary btn-sm" 
                                                href="{{ route('doctors.show', $doctor->id) }}">
                                                {{ __('views.show') }}
                                            </a>
                                            <a class="btn btn-warning btn-sm" 
                                                href="{{ route('doctors.edit', $doctor->id) }}">
                                                {{ __('views.edit') }}
                                            </a>
                                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="post">
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