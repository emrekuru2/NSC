<?php

function toast($type, $content)
{
    return redirect()->back()->with('alert', ['type' => $type, 'content' => $content]);
}

function operationsEN($type, $operations, $custom = null)
{
    $results = [];
    $type = strtolower($type);

    foreach ($operations as $operation) {
        $pattern = '/^[^A-Z]+|[A-Z][^A-Z]+/';
        preg_match_all($pattern, $operation, $matches);

        if (sizeof($matches[0]) === 1) {
            $results[$type][$operation] = [
                'success' => $type . ' ' . $operation . ' operation performed succesfully!',
                'error'   => $type . ' ' . $operation . ' operation could not be performed'
            ];
        } else {
            $matches = $matches[0];
            $results[$type][$operation] = [
                'success' => $matches[1] . ' ' . $matches[0] . ' operation performed succesfully!',
                'error'   => $matches[1] . ' ' . $matches[0] . ' operation could not be performed'
            ];
        }
    }

    if (isset($custom)) {
        foreach ($custom as $key => $value) {
            $results[$type][$key] = $value;
        }
    }

    return $results;
}
