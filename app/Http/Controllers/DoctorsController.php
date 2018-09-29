<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Doctor;

class DoctorsController extends Controller
{
    
    protected $doctor;

    public function __construct()
    {
        $this->doctor = new Repository(new Doctor);
    }
    
    public function index()
    {
        $returns = [
            'doctors' => $this->doctor->all()
        ];
        return view('doctors.index', $returns);
    }

    public function show($id)
    {
        $returns = [
            'doctor' => $this->doctor->preview($id),
            'disabled' => true
        ];
        return view('doctors.show', $returns);
    }

    public function create()
    {
        $returns = [
            'disabled' => false
        ];
        return view('doctors.create', $returns);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'crm' => 'required|unique:doctors,crm|max:10'
        ]);

        $data = $request->all();
        $doctor = $this->doctor->create($data);
        if ($doctor) {
            return redirect(route('doctors.show', $doctor->id));
        }
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $returns = [
            'doctor' => $this->doctor->preview($id),
            'disabled' => false
        ];
        return view('doctors.edit', $returns);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'crm' => 'max:10|unique:doctors,crm,'.$id
        ]);

        $data = $request->all();
        $result = $this->doctor->update($data, $id);
        if ($result) {
            return redirect(route('doctors.show', $id));
        }
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $this->doctor->delete($id);
        return redirect(route('doctors.index'));
    }
    
}
