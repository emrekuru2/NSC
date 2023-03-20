<?php

function storeImage($folder, $file)
{
    if ($file->isValid()) {
        $newName = $file->getRandomName();
        $path = 'assets/images/' . $folder . '/';
        $file->store("../../public/" . $path, $newName);
        return $path . $newName;
    }

    return false;
}