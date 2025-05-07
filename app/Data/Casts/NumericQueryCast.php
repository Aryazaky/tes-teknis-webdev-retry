<?php

use App\Helpers\ExpressionToClosure;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

// Unused class
// For example, "35 > age > 30" or "age > 30 && age < 35" will be converted to a query func like: function($age) => $age > 30 && $age < 35
// The number can be an integer or a float.
class NumericQueryCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        if ($value === null) {
            return null;
        }

        if (is_numeric($value)) {
            return $value;
        }

        $to_closure = new ExpressionToClosure($value, ['x']);

        return $to_closure->getClosure();
    }
}
