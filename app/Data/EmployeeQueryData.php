<?php

namespace App\Data;

use DateTime;
use NumericQueryCast;
use Spatie\LaravelData\Data;

// Update 2025-05-07: setelah install laravel query builder, sepertinya class ini tidak terpakai lagi
class EmployeeQueryData extends Data
{
    public ?string $name = null;
    public ?string $birthplace = null;
    public ?string $address = null;
    public ?DateTime $birthdate = null; // Y-M-D
    public ?string $gender = null; // this is enum in the database. 'L' or 'P'
    public ?string $religion = null; // this is enum in the database. 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'
    public ?string $phone = null; // May have leading zeros. So always use string
    public ?NumericQueryCast $employee_number = null;
    public ?string $rank = null; // Uses roman numerals. 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'. Maybe could be an integer.
    public ?string $echelon = null; // I/a, II/c, etc.
    public ?string $position = null;
    public ?string $assignment_location = null;
    public ?string $department = null;
    public ?string $taxpayer_id = null; // May have leading zeros. So always use string

    // TODO: how to allow stuff like 'get all employees with birthdate between 1990-01-01 and 2000-01-01'?
    // Or 'get all employees with rank less than IV'?
    // Potential solution: use a string for the query (maybe with embedded comparison like "$rank<"IV"") and parse it in the action class
    // Or use a separate class for each query type?



    public static function rules(): array
    {
        return [
            // Validation rules here
            // Maybe only enum and date gets validated
        ];
    }
}
