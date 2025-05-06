<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\PersonalData;
use App\Models\EmploymentData;
use App\Imports\EmployeesCollectionImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new EmployeesCollectionImport, 'tes-teknis-data-pegawai.xlsx');

        dump(Employee::all()->toArray());
        dump(PersonalData::all()->toArray());
        dump(EmploymentData::all()->toArray());
    }
}
