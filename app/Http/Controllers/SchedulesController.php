<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ScheduleRequest;
use App\Repositories\Repository;
use App\Doctor;
use App\Patient;
use App\Schedule;

class SchedulesController extends Controller
{
    
    protected $schedule;
    protected $patient;
    protected $doctor;

    public function __construct()
    {
        $this->doctor = new Repository(new Doctor);
        $this->patient = new Repository(new Patient);
        $this->schedule = new Repository(new Schedule);
    }
    
    public function index()
    {
        $returns = [
            'schedules' => $this->schedule->all()
        ];
        return view('schedules.index', $returns);
    }

    public function show($id)
    {
        $returns = [
            'schedule' => $this->schedule->preview($id),
            'disabled' => true,
            'patients' => $this->patient->all(),
            'doctors' => $this->doctor->all(),
            'status' => Schedule::getStatus(),
        ];
        return view('schedules.show', $returns);
    }

    public function create()
    {
        $returns = [
            'disabled' => false,
            'patients' => $this->patient->all(),
            'doctors' => $this->doctor->all(),
            'status' => Schedule::getStatus(),
        ];
        return view('schedules.create', $returns);
    }

    public function store(ScheduleRequest $request)
    {
        $data = $request->all();
        $data['register_by_user_id'] = Auth::user()->id;
        $examsJson = [];
        if ($request->exams) {
            foreach ($request->exams as $exam) {
                $filename = $exam->store('public/exams');
                $examsJson[] = $filename;
            }
        }
        $data['exams'] = json_encode($examsJson);
        $schedule = $this->schedule->create($data);
        if ($schedule) {
            return redirect(route('schedules.show', $schedule->id));
        }
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $returns = [
            'schedule' => $this->schedule->preview($id),
            'disabled' => false,
            'patients' => $this->patient->all(),
            'doctors' => $this->doctor->all(),
            'status' => Schedule::getStatus(),
        ];
        return view('schedules.edit', $returns);
    }

    public function update($id, ScheduleRequest $request)
    {
        $schedule = $this->schedule->preview($id);
        $data = $request->all();
        $examsJson = json_decode($schedule->exams);
        if ($request->exams) {
            foreach ($request->exams as $exam) {
                $filename = $exam->store('public/exams');
                $examsJson[] = $filename;
            }
        }
        $data['exams'] = json_encode($examsJson);
        $result = $this->schedule->update($data, $id);
        if ($result) {
            return redirect(route('schedules.show', $id));
        }
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $this->schedule->delete($id);
        return redirect(route('schedules.index'));
    }

}
