<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Entities\User;

class SidebarCell extends Cell
{
    public $title;
    protected string $view = 'views/sidebar';
    private ?User $user = null;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function getUserProperty(): ?User
    {
        return $this->user;
    }
}
