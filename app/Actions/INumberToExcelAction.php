<?php

namespace App\Actions;

use App\Http\Requests\NumberToExcelRequest;

interface INumberToExcelAction
{
    public function handle(int $index): string;
}
