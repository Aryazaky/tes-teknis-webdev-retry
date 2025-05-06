<?php
namespace App\Actions;



class GetAllEmployeesAction
{
    public static function run(bool $includePersonalData = false, bool $includeEmploymentData = false): \Illuminate\Database\Eloquent\Collection
    {
        $query = \App\Models\Employee::query();

        if ($includePersonalData) {
            $query->with('personalData');
        }

        if ($includeEmploymentData) {
            $query->with('employmentData');
        }

        return $query->get();
    }
}
