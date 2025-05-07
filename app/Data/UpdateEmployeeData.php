<?php

namespace App\Data;

use DateTime;
use Spatie\LaravelData\Data;

class UpdateEmployeeData extends Data
{
    public ?int $id = null;

    public ?int $employee_number = null;
    public ?string $name = null;
    public ?string $photo_filepath = null; // this is a URL to the photo
    public ?string $phone = null; // May have leading zeros. So always use string
    public ?string $address = null;
    public ?string $birthplace = null;
    public ?DateTime $birthdate = null; // Y-M-D
    public ?string $gender = null; // this is enum in the database. 'L' or 'P'
    public ?string $religion = null; // this is enum in the database. 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'
    public ?string $rank = null; // Uses roman numerals. 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'. Maybe could be an integer.
    public ?string $echelon = null; // I/a, II/c, etc.
    public ?string $position = null;
    public ?string $assignment_location = null;
    public ?string $department = null;
    public ?string $taxpayer_id = null; // May have leading zeros. So always use string

    public static function rules(): array
    {
        return [
            'gender' => ['nullable', 'string', 'in:L,P'],
            'religion' => ['nullable', 'string', 'in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu'],
            'rank' => ['nullable', 'string', 'in:I,II,III,IV,V,VI,VII,VIII'],
        ];
    }
}
