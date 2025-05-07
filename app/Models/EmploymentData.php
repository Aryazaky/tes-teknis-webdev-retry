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
 * @property string $rank
 * @property string|null $echelon
 * @property string|null $position
 * @property string|null $assignment_location
 * @property string|null $department
 * @property string|null $taxpayer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Database\Factories\EmploymentDataFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereAssignmentLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereEchelon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereTaxpayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmploymentData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmploymentData extends Model
{
    protected $fillable = [
        'employee_id',
        'rank',
        'echelon',
        'position',
        'assignment_location',
        'department',
        'taxpayer_id',
    ];

    /** @use HasFactory<\Database\Factories\EmploymentDataFactory> */
    use HasFactory;

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
