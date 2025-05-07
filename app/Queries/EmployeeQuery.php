<?php

namespace App\Queries;

use App\Models\Employee;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class EmployeeQuery
{
    public static function autoFromRequest()
    {
        return QueryBuilder::for(Employee::class)
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
    }
}
