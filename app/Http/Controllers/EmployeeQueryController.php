<?php

namespace App\Http\Controllers;

use App\Actions\EmployeeQueryAction;
use App\Data\EmployeeQueryData;
use Illuminate\Http\Request;

class EmployeeQueryController extends Controller
{
    public function query(EmployeeQueryData $data)
    {
        $employees = EmployeeQueryAction::run($data);
        return response()->json($employees);
    }
}
