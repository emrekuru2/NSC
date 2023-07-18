<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class AlertCell extends Cell
{
    protected string $view      = 'views/alert';
    protected ?string $title    = '';
    protected ?string $content  = '';
    protected ?bool $isset      = false;

    public function mount()
    {
        $alert       = session()->get('alert');
        $this->isset = is_null($alert) ? false : true;

        if ($this->isset === true) {
            $this->title   = $alert['title'];
            $this->content = $alert['content'];
        }
    }

    public function getTitleProperty(): string
    {
        return $this->title;
    }

    public function getContentProperty(): string
    {
        return $this->content;
    }

    public function getIssetProperty(): string
    {
        return $this->isset;
    }
}
