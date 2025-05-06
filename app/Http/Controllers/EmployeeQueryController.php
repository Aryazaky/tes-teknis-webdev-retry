<?php

namespace App\Http\Controllers;

use App\Data\EmployeeQueryData;
use Illuminate\Http\Request;

class EmployeeQueryController extends Controller
{
    public function query(EmployeeQueryData $data)
    {
        $query = \App\Models\Employee::query()->with('personalData', 'employmentData');

        if ($data->employee_number) {
            $query->where('employee_number', $data->employee_number);
        }

        if ($data->name) {
            $query->where('personal_data.name', 'like', '%' . $data->name . '%');
        }

        // TODO: Lanjutkan

        return response()->json($query->get());
    }
}
