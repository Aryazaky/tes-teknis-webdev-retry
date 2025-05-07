<?php

namespace App\Helpers;

use ChrisKonnertz\StringCalc\StringCalc;
use Closure;
use ChrisKonnertz\StringCalc\Exceptions\StringCalcException;

class ExpressionToClosure
{
    public string $expression;
    public array $variables; // e.g., ['x', 'y', 'z']
    private StringCalc $calc;

    public function __construct(string $expression, array $variables = ['x'])
    {
        $this->expression = $expression;
        $this->variables = $variables;
        $this->calc = new StringCalc();
    }

    public function getClosure(): Closure
    {
        $expression = $this->expression;
        $variables = $this->variables;

        return function (array $values) use ($expression, $variables) {
            $evalString = $expression;

            foreach ($variables as $var) {
                if (!array_key_exists($var, $values)) {
                    return false; // missing variable
                }
                $evalString = str_replace($var, (string)$values[$var], $evalString);
            }

            try {
                return $this->calc->calculate($evalString);
            } catch (StringCalcException $exception) {
                return false;
            }
        };
    }

    public static function getClosureStatic(string $expression, array $variables = ['x']): Closure
    {
        return function (array $values) use ($expression, $variables) {
            $evalString = $expression;

            foreach ($variables as $var) {
                if (!array_key_exists($var, $values)) {
                    return false;
                }
                $evalString = str_replace($var, (string)$values[$var], $evalString);
            }

            $calc = new StringCalc();

            try {
                return $calc->calculate($evalString);
            } catch (StringCalcException $exception) {
                // Daripada crash seluruh backend gara2 user usil, mending return false. Tapi calculate() bisa return 0. Jadi harus di handle pakai '===' strict comparison
                return false;
            }
        };
    }

    // harus pass in value dummy karena yang throw StringCalcException adalah calculate(), dan calculate() tidak bisa di mock
    public function test(array $values = ['x' => 0]): bool
    {
        return $this->getClosure()($values) !== false;
    }
}
