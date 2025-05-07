<?php

namespace App\Http\Controllers;

use App\Actions\GetEmployeesAction;
use App\Actions\DeleteEmployeesAction;
use App\Actions\AddEmployeesAction;
use App\Actions\UpdateEmployeesAction;
use App\Data\AddEmployeeData;
use App\Data\UpdateEmployeeData;
use App\Data\DeleteEmployeeData;

class EmployeeController extends Controller
{
    public function query()
    {
        return response()->json(GetEmployeesAction::run());
    }

    public function add(AddEmployeeData $data)
    {
        return response()->json(AddEmployeesAction::run($data));
    }

    public function update(UpdateEmployeeData $data)
    {
        return response()->json(UpdateEmployeesAction::run($data));
    }

    public function delete(DeleteEmployeeData $data)
    {
        return response()->json(DeleteEmployeesAction::run($data));
    }
}
