@include('components.alerts')

<div class="form-group">
    <label for="name">{{ __('validation.attributes.name') }}</label>
    <input type="name" class="form-control" id="name" 
        name="name" aria-describedby="nameHelp" required
        value="{{ $user->name ?? old('name') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="nameHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="email">{{ __('validation.attributes.email') }}</label>
    <input type="email" class="form-control" id="email" 
        name="email" aria-describedby="emailHelp" required
        value="{{ $user->email ?? old('email') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="emailHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

@unless ($disabled)
    <div class="form-group">
        <label for="password">{{ __('validation.attributes.password') }}</label>
        <input type="password" class="form-control" id="password" 
            name="password" aria-describedby="passwordHelp" {{ $user->password ?? 'required' }}>
        <small id="passwordHelp" class="form-text text-muted">{{ __('passwords.password') }}</small>
    </div>

    <div class="form-group">
        <label for="password_confirmation">{{ __('validation.attributes.password_confirmation') }}</label>
        <input type="password" class="form-control" id="password_confirmation" 
            name="password_confirmation" aria-describedby="passwordConfirmationHelp" {{ $user->password ?? 'required' }}>
        <small id="passwordConfirmationHelp" class="form-text text-muted">{{ __('passwords.confirmation') }}</small>
    </div>
@endunless