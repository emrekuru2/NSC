<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Entities\User;

class NavbarCell extends Cell
{
    public $title;
    private ?User $user        = null;
    private ?array $groups     = [];
    private ?bool $isLoggedIn  = false;
    protected string $view     = 'views/navbar';

    public function mount()
    {
        $this->isLoggedIn = auth()->loggedIn();

        if ($this->isLoggedIn) {
            $this->user   = auth()->user();
        }

        $this->groups = ['admin', 'manager', 'player', 'umpire', 'guest'];
    }

    public function getUserProperty(): ?User
    {
        return $this->user;
    }

    public function getGroupsProperty(): array
    {
        return $this->groups;
    }

    public function getIsLoggedInProperty(): bool
    {
        return $this->isLoggedIn;
    }
}
