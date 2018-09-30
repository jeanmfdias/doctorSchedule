@include('components.alerts')

<div class="form-group">
    <label for="name">{{ __('validation.attributes.name') }}</label>
    <input type="text" class="form-control" id="name" 
        name="name" aria-describedby="nameHelp" required
        value="{{ $patient->name ?? old('name') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="nameHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="cpf">{{ __('validation.attributes.cpf') }}</label>
    <input type="text" class="form-control" id="cpf" 
        name="cpf" aria-describedby="cpfHelp" required
        value="{{ $patient->cpf ?? old('cpf') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="cpfHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="status">{{ __('validation.attributes.status') }}</label>
    <div class="custom-control custom-radio">
        <input type="radio" id="statusActive" name="status" 
            class="custom-control-input" {{ $disabled ? 'disabled' : null }}
            {{ isset($patient) && $patient->status ? 'checked' : null  }} value="1">
        <label class="custom-control-label" for="statusActive">{{ __('views.active') }}</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="statusInactive" name="status" 
            class="custom-control-input" {{ $disabled ? 'disabled' : null }}
            {{ isset($patient) && $patient->status == 0 ? 'checked' : null  }} value="0">
        <label class="custom-control-label" for="statusInactive">{{ __('views.inactive') }}</label>
    </div>
</div>