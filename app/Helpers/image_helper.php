<?php

function storeImage($folder, $file): string
{
    if (!isset($file)) {
        return null;
    }

    $path = 'assets/images/' . $folder . '/';

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move($path, $newName);

        return $path . $newName;
    }

    return $path . "default.png";
}
