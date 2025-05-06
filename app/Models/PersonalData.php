<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $employee_id
 * @property string|null $name
 * @property string|null $birthplace
 * @property string|null $address
 * @property string $birthdate
 * @property string $gender
 * @property string $religion
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Database\Factories\PersonalDataFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereBirthplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PersonalData extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'birthplace',
        'address',
        'birthdate',
        'gender',
        'religion',
        'phone',
    ];

    /** @use HasFactory<\Database\Factories\PersonalDataFactory> */
    use HasFactory;

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
