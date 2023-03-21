<?php

function storeImage($folder, $file)
{
    if ($file->isValid() && str_contains($file->getMimeType(), 'image')) {
        $newName = $file->getRandomName();
        $path = 'assets/images/' . $folder . '/';
        $file->store("../../public/" . $path, $newName);
        return $path . $newName;
    }

    return false;
}