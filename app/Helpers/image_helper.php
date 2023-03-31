<?php

function storeImage($folder, $file)
{
    if ($file->isValid() && ! $file->hasMoved()) {
        $newName = $file->getRandomName();
        $path    = '/assets/images/' . $folder . '/';
        $file->move($path, $newName);

        return $path . $newName;
    }

    return false;
}
