<?php

namespace App\Actions;

class CaesarEncodeAction implements ICaesarEncodeAction
{

    public function handle(array $data): string
    {
        $inputString = $data['input_string'];
        $shift = $data['shift'] % 26; // Normalize the shift

        $result = array_map(function ($char) use ($shift) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? 65 : 97;
                return chr(($asciiOffset + (ord($char) - $asciiOffset + $shift) % 26));
            }
            return $char; // Non-alphabet characters remain unchanged
        }, str_split($inputString));

        return implode('', $result);
    }
}
