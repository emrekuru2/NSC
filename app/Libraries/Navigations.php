<?php

namespace App\Libraries;

class Navigations
{
    public function navbar()
    {
        return view('components/navbar.php');
    }

    public function sidebar()
    {
        return view('components/sidebar.php');
    }
}
