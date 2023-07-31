<?php

namespace App\Interfaces;

interface Alerts
{
    public function enable();

    public function disable(int $param);
}
