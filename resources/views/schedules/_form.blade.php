@include('components.alerts')

<div class="form-group">
    <div class="form-group">
        <label for="patient_id">{{ __('validation.attributes.patient_id') }}</label>
        <select class="form-control" id="patient_id" name="patient_id"
            {{ $disabled ? 'disabled' : null }}>
            <option value="0" selected disabled>{{ __('messages.select_a_patient') }}</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" 
                    {{ isset($schedule) && $schedule->patient_id == $patient->id ? 'selected' : null }}>
                    {{ $patient->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <label for="doctor_id">{{ __('validation.attributes.doctor_id') }}</label>
        <select class="form-control" id="doctor_id" name="doctor_id"
            {{ $disabled ? 'disabled' : null }}>
            <option value="0" selected disabled>{{ __('messages.select_a_doctor') }}</option>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}"
                    {{ isset($schedule) && $doctor->id == $schedule->doctor_id ? 'selected' : null }}>
                    {{ $doctor->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="date_time">{{ __('validation.attributes.date_time') }}</label>
    <input type="datetime-local" class="form-control" id="date_time" 
        name="date_time" aria-describedby="dateTimeHelp" required
        value="{{ isset($schedule) ? date('Y-m-d\TH:i:s', strtotime($schedule->date_time)) : old('date_time') }}" {{ $disabled ? 'disabled' : null }}>
    <small id="dateTimeHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="description">{{ __('validation.attributes.description') }}</label>
    <textarea class="form-control" id="description" rows="3"
        required name="description" {{ $disabled ? 'disabled' : null }}
        >{{ $schedule->description ?? old('description') }}</textarea>
    <small id="descriptionHelp" class="form-text text-muted">{{ __('views.required') }}</small>
</div>

<div class="form-group">
    <label for="exams">{{ __('validation.attributes.exams') }}</label>
    @unless ($disabled)
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="exams" 
                name="exams[]" multiple>
            <label class="custom-file-label" for="exams">{{ __('views.choose_file') }}</label>
        </div>
    @endunless
    @php
        $exams = $schedule->exams ?? null;
        if ($exams) {
            $exams = json_decode($exams);
        } else {
            $exams = [];
        }
    @endphp
    <ul>
        @foreach ($exams as $key => $exam)
            <li>
                <a href="{{ asset("storage/$exam") }}" target="_blank">
                    {{ trans_choice('views.exams', 1) . ' ' . ++$key }} 
                </a>
            </li>
        @endforeach
    </ul>
</div>

<div class="form-group">
    <div class="form-group">
        <label for="status">{{ __('validation.attributes.status') }}</label>
        <select class="form-control" id="status" name="status"
            {{ $disabled ? 'disabled' : null }}>
            <option value="0" selected disabled>{{ __('messages.select_an_option') }}</option>
            @foreach ($status as $item)
                <option value="{{ $item }}"
                    {{ isset($schedule) && $schedule->status == $item ? 'selected' : null }}>
                    {{ __("views.schedule_status.$item") }}
                </option>
            @endforeach
        </select>
    </div>
</div>