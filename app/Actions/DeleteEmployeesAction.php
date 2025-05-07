<?php
namespace App\Actions;

use App\Models\Employee;
use App\Queries\EmployeeQuery;
use App\Data\DeleteEmployeeData;

class DeleteEmployeesAction
{
    public static function run(DeleteEmployeeData $data)
    {
        return response()->json([
            'message' => $data,
        ]);
        // If the id is not null, delete the specific employee
        if ($data->id !== null) {
            $employee = Employee::find($data->id);

            if ($employee) {
                $employee->delete();

                return response()->json([
                    'message' => 'Employee deleted successfully. in id not null',
                    'deleted_count' => 1,
                ]);
            }

            return response()->json([
                'message' => 'Employee not found.',
            ], 404);
        }

        // If the id is null, delete all employees in the query
        else return self::deleteAll();
    }

    private static function deleteAll()
    {
        $employeesToDelete = EmployeeQuery::autoFromRequest()->get();

        foreach ($employeesToDelete as $employee) {
            $employee->delete();
        }

        return response()->json([
            'message' => 'Employees deleted successfully.',
            'deleted_count' => $employeesToDelete->count(),
        ]);
    }
}
