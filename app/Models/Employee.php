<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property int|null $employee_number
 * @property string|null $name
 * @property string|null $photo_filepath
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EmploymentData|null $employmentData
 * @property-read \App\Models\PersonalData|null $personalData
 * @method static \Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmployeeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePhotoFilepath($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    protected $fillable = [
        'employee_number',
        'name',
        'photo_filepath',
    ];

    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    public function personalData() : HasOne
    {
        return $this->hasOne(PersonalData::class);
    }

    public function employmentData() : HasOne
    {
        return $this->hasOne(EmploymentData::class);
    }

    public function contact() : HasOne
    {
        return $this->hasOne(EmployeeContact::class);
    }
}
