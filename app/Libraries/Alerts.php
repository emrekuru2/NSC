<?php namespace App\Libraries;

class Alerts {

    public function modal($content) {
        return view('components/modal', $content);

    }

    public function toast($content) {
        return view('components/toast', $content);
    }
}