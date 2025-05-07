<?php
namespace App\Actions;

use App\Queries\EmployeeQuery;

class GetEmployeesAction
{
    public static function run()
    {
        return response()->json(EmployeeQuery::autoFromRequest()->get());
    }
}
