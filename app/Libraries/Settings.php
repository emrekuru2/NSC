<?php

namespace App\Libraries;

class Settings
{
    public function profileSettings($content)
    {
        return view('components/profileSettings.php', $content);
    }

   
}
