<?php
namespace App\Actions;

use App\Data\AddEmployeeData;
use App\Models\Employee;
use App\Models\EmployeeContact;
use App\Models\PersonalData;
use App\Models\EmploymentData;

class AddEmployeesAction
{
    public static function run(AddEmployeeData $data)
    {
        $employee = Employee::create([
            'employee_number' => $data->employee_number,
            'name' => $data->name,
            'photo_filepath' => $data->photo_filepath,
        ]);
        $contact = EmployeeContact::create([
            'employee_id' => $employee->id,
            'address' => $data->address,
            'phone' => $data->phone,
        ]);
        $personalData = PersonalData::create([
            'employee_id' => $employee->id,
            'birthplace' => $data->birthplace,
            'birthdate' => $data->birthdate,
            'gender' => $data->gender,
            'religion' => $data->religion,
        ]);
        $employmentData = EmploymentData::create([
            'employee_id' => $employee->id,
            'rank' => $data->rank,
            'echelon' => $data->echelon,
            'position' => $data->position,
            'assignment_location' => $data->assignment_location,
            'department' => $data->department,
            'taxpayer_id' => $data->taxpayer_id,
        ]);
        return $employee;
    }
}
