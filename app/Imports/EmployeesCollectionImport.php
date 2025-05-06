<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Employee;
use App\Models\PersonalData;
use App\Models\EmploymentData;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeesCollectionImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $employee = Employee::factory()->create([
                'employee_number' => $row['employee_number'],
            ]);
            $birthdate = Date::excelToDateTimeObject($row['birthdate'])->format('Y-m-d');
            $personalData = PersonalData::factory()->create([
                'employee_id' => $employee->id,
                'name' => $row['name'],
                'birthplace' => $row['birthplace'],
                'address' => $row['address'],
                'birthdate' => $birthdate,
                'gender' => $row['gender'],
                'religion' => $row['religion'],
                'phone' => $row['phone'],
            ]);
            $employmentData = EmploymentData::factory()->create([
                'employee_id' => $employee->id,
                'rank' => $row['rank'],
                'echelon' => $row['echelon'],
                'position' => $row['position'],
                'assignment_location' => $row['assignment_location'],
                'department' => $row['department'],
                'taxpayer_id' => $row['taxpayer_id'],
            ]);
        }
    }
}
