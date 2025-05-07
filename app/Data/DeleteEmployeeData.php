<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class DeleteEmployeeData extends Data
{
    // the employee id to delete. If null, all employees in query will be deleted
    public ?int $id;

    public static function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
        ];
    }
}
