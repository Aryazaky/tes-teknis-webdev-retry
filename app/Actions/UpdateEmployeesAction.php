<?php
namespace App\Actions;

use App\Data\UpdateEmployeeData;
use App\Models\Employee;

class UpdateEmployeesAction
{
    public static function run(UpdateEmployeeData $data)
    {
        $employee = Employee::find($data->id);
        if ($employee) {
            $employee->update([
                'employee_number' => $data->employee_number ?? $employee->employee_number,
                'name' => $data->name ?? $employee->name,
                'photo_filepath' => $data->photo_filepath ?? $employee->photo_filepath,
            ]);
            $employee->contact()->update([
                'address' => $data->address ?? $employee->contact->address,
                'phone' => $data->phone ?? $employee->contact->phone,
            ]);
            $employee->personalData()->update([
                'birthplace' => $data->birthplace ?? $employee->personalData->birthplace,
                'birthdate' => $data->birthdate ?? $employee->personalData->birthdate,
                'gender' => $data->gender ?? $employee->personalData->gender,
                'religion' => $data->religion ?? $employee->personalData->religion,
            ]);
            $employee->employmentData()->update([
                'rank' => $data->rank ?? $employee->employmentData->rank,
                'echelon' => $data->echelon ?? $employee->employmentData->echelon,
                'position' => $data->position ?? $employee->employmentData->position,
                'assignment_location' => $data->assignment_location ?? $employee->employmentData->assignment_location,
                'department' => $data->department ?? $employee->employmentData->department,
                'taxpayer_id' => $data->taxpayer_id ?? $employee->employmentData->taxpayer_id,
            ]);
            return $employee;
        }
        return null;
    }
}
