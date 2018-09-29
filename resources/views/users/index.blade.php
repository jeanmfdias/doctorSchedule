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
                    
                    <div class="table-responsible">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('validation.attributes.id') }}</th>
                                <th>{{ __('validation.attributes.name') }}</th>
                                <th>{{ __('validation.attributes.email') }}</th>
                                <th>{{ trans_choice('views.actions', 2) }}</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-secondary btn-sm" 
                                                href="{{ route('users.show', $user->id) }}">
                                                {{ __('views.show') }}
                                            </a>
                                            <a class="btn btn-warning btn-sm" 
                                                href="{{ route('users.edit', $user->id) }}">
                                                {{ __('views.edit') }}
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
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