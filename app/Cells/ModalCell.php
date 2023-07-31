<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class ModalCell extends Cell
{
    public $id;
    public $action;
    public $content;
    public $currentClub;
    public $selection;
    public $program;
    public $currentTeam;
    public $committee;
    protected string $view;

    public function mount(?string $type)
    {
        $this->view = $this->viewType($type);
    }

    private function viewType(string $type): string
    {
        switch ($type) {
            case 'prompt':
                return 'views/modals/promptModal';
            case 'club':
                return 'views/modals/clubModal';
            case 'dev':
                return 'views/modals/devModal';
            case 'teamUser':
                return 'views/modals/teamUserModal';
            case  'committee':
                return 'views/modals/committeeModal';

        }
    }
}
