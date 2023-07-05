<?php

namespace App\Libraries;

class Contents
{
    public function accordion($content)
    {
        return view('components/accordion', $content);
    }

    public function editor($content)
    {
        return view('components/editor', $content);
    }

    public function comment($content)
    {
        return view('components/comment', $content);
    }

    public function search($content)
    {
        return view('components/search', $content);
    }
}
