@include('components.alerts')

<div class="form-group">
    <label for="name">{{ __('validation.attributes.name') }}</label>
    <input type="name" class="form-control" id="name" 
        name="name" aria-describedby="nameHelp" required
        value="{{ $doctor->name ?? old('name') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="nameHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="crm">{{ __('validation.attributes.crm') }}</label>
    <input type="crm" class="form-control" id="crm" 
        name="crm" aria-describedby="crmHelp" required
        value="{{ $doctor->crm ?? old('crm') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="crmHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="status">{{ __('validation.attributes.status') }}</label>
    <div class="custom-control custom-radio">
        <input type="radio" id="statusActive" name="status" 
            class="custom-control-input" {{ $disabled ? 'disabled' : null }}
            {{ isset($doctor) && $doctor->status ? 'checked' : null  }} value="1">
        <label class="custom-control-label" for="statusActive">{{ __('views.active') }}</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="statusInactive" name="status" 
            class="custom-control-input" {{ $disabled ? 'disabled' : null }}
            {{ isset($doctor) && $doctor->status == 0 ? 'checked' : null  }} value="0">
        <label class="custom-control-label" for="statusInactive">{{ __('views.inactive') }}</label>
    </div>
</div>