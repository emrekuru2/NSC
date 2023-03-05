<?php

namespace App\Libraries;

class Contents
{
    public function accordion()
    {
        return view('components/accordion');
    }

    public function editor()
    {
        return view('components/editor');
    }

    public function comment($content)
    {
        return view('components/comment', $content);
    }
}
