<?php

namespace App\Actions;


interface INumberToExcelAction
{
    public function handle(int $index): string;
}
