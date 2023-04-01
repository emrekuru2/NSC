<?php

function storeImage($folder, $file)
{
    if ($file->isValid() && ! $file->hasMoved() && str_contains($file->getMimeType(), 'image')) {
        $newName = $file->getRandomName();
        $path    = '/assets/images/' . $folder . '/';
        $file->move($path, $newName);

        return $path . $newName;
    }

    return false;
}
