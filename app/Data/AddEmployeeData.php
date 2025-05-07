<?php

namespace App\Data;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;


// Update 2025-05-07: setelah install laravel query builder, sepertinya class ini tidak terpakai lagi
// Update 2025-05-07: dipakai buat add employee saja
class AddEmployeeData extends Data
{
    public ?int $employee_number = null;
    public ?string $name = null;
    public ?string $photo_filepath = null; // this is a URL to the photo
    public ?string $phone = null; // May have leading zeros. So always use string
    public ?string $address = null;
    public ?string $birthplace = null;
    public DateTime $birthdate; // Y-M-D
    public string $gender; // this is enum in the database. 'L' or 'P'
    public string $religion; // this is enum in the database. 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'
    public string $rank; // Uses roman numerals. 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'. Maybe could be an integer.
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
