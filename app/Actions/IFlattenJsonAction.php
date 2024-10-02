<?php

namespace App\Actions;

interface IFlattenJsonAction
{
    public function handle(array $data, string $prefix = ''): array;
}
