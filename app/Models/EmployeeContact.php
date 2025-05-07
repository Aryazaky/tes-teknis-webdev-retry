<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $employee_id
 * @property string|null $address
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Database\Factories\EmployeeContactFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeContact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmployeeContact extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeContactFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'address',
        'phone',
    ];

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
