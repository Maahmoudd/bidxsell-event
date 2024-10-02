<?php

namespace App\Actions;

interface ICaesarEncodeAction
{
    public function handle(array $data): string;
}
