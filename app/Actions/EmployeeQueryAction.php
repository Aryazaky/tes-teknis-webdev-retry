<?php
namespace App\Actions;

use App\Data\EmployeeQueryData;
use App\Models\Employee;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

// Rules from a tutorial I watched: Only action classes gets to interact with the database
class EmployeeQueryAction
{
    public static function run()
    {
        //..
        // $query = Employee::query()->with('personalData', 'employmentData');

        // if ($data->employee_number) {
        //     $query->where('employee_number', $data->employee_number);
        // }

        // if ($data->name) {
        //     $query->where('personal_data.name', 'like', '%' . $data->name . '%');
        // }

        // // TODO: Lanjutkan

        // Gajadi lanjutkan. Pakai query builder dari laravel yang lebih powerful
        $employees = QueryBuilder::for(Employee::class)
            ->with([
                'personalData',
                'employmentData',
            ])
            ->allowedFilters([
                AllowedFilter::exact('employee_number'),
                AllowedFilter::partial('name', 'personalData.name'),
                AllowedFilter::partial('birthplace', 'personalData.birthplace'),
                AllowedFilter::partial('address', 'personalData.address'),
                AllowedFilter::scope('birthdate', 'personalData.birthdate'),
                AllowedFilter::exact('gender', 'personalData.gender'),
                AllowedFilter::exact('religion', 'personalData.religion'),
                AllowedFilter::partial('phone', 'personalData.phone'),
                AllowedFilter::exact('rank', 'employmentData.rank'), // Butuh di cast untuk "all employees with rank less than IV"
                AllowedFilter::exact('echelon', 'employmentData.echelon'),
                AllowedFilter::partial('position', 'employmentData.position'),
                AllowedFilter::partial('assignment_location', 'employmentData.assignment_location'),
                AllowedFilter::partial('department', 'employmentData.department'),
                AllowedFilter::exact('taxpayer_id', 'employmentData.taxpayer_id'),
            ]);

        return response()->json($employees->get());
    }
}
