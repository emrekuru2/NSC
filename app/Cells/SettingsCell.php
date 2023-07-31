<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Entities\User;

class SettingsCell extends Cell
{
    private ?User $user = null;
    protected string $view;

    public function mount(?string $tab)
    {
        $this->view = $this->viewType($tab);
        $this->user = auth()->user();
    }

    private function viewType(string $tab): string
    {
        switch ($tab) {
            case 'profile':
                return 'views/settings/profileSettings';
            case 'email':
                return 'views/settings/emailSettings';
            case 'database':
                return 'views/settings/databaseSettings';
        }
    }

    public function getUserProperty(): ?User
    {
        return $this->user;
    }
}
