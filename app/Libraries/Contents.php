<?php

namespace App\Libraries;

class Contents
{
    public function accordion($content)
    {
        return view('components/accordion', $content);
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
