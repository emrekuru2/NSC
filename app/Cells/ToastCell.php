<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class ToastCell extends Cell
{
    protected ?string $type = '';
    protected ?string $content = '';
    protected ?bool $isset = false;
    protected string $view = 'views/toast';

    public function mount()
    {
        $flashData     = session()->getFlashdata('toast');
        $this->isset   = is_null($flashData) ? false : true;

        if ($this->isset === true) {
            $this->type    = $flashData['type'];
            $this->content = $flashData['content'];
        }
    }

    public function getTypeProperty(): string
    {
        return $this->type;
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
