<?php

namespace App\Actions;

use App\Http\Requests\NumberToExcelRequest;

class NumberToExcelAction implements INumberToExcelAction
{

    public function handle(int $index): string
    {
        $result = '';

        while ($index > 0) {
            $remainder = ($index - 1) % 26;
            $result = chr(65 + $remainder) . $result;
            $index = intdiv($index - 1, 26);
        }
        return $result;
    }
}
