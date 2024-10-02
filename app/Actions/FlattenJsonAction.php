<?php

namespace App\Actions;

class FlattenJsonAction implements IFlattenJsonAction
{

    /**
     * Flatten a nested JSON object into a single-level associative array.
     *
     * @param array $data Input data containing a JSON-encoded string.
     * @param string $prefix Prefix for the keys in the output array.
     * @return array Flattened associative array.
     */
    public function handle(array $data, string $prefix = ''): array
    {
        $inputJson = json_decode($data['input_json'], true);

        return collect($inputJson)->reduce(function ($result, $value, $key) use ($prefix) {
            // Create the new key using the prefix
            $newKey = $prefix . $key;

            if (is_array($value)) {
                // If the value is an array, recursively flatten it
                $flattened = $this->handle(['input_json' => json_encode($value)], $newKey . '.');
                // Merge the flattened array directly into the result
                return array_merge($result, $flattened);
            } else {
                // If the value is not an array, store it in the result with the current key
                $result[$newKey] = $value;
                return $result;
            }
        }, []);
    }
}
