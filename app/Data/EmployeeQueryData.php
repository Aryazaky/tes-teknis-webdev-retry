<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class EmployeeQueryData extends Data
{
    public ?string $name = null;
    public ?string $birthplace = null;
    public ?string $address = null;
    public ?string $birthdate = null;
    public ?string $gender = null;
    public ?string $religion = null;
    public ?string $phone = null;
    public ?int $employee_number = null;
    public ?string $rank = null;
    public ?string $echelon = null;
    public ?string $position = null;
    public ?string $assignment_location = null;
    public ?string $department = null;
    public ?string $taxpayer_id = null;

    public static function rules(): array
    {
        return [
            // Validation rules here
        ];
    }
}
