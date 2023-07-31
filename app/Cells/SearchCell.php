<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class SearchCell extends Cell
{
    public $type;
    public $data;
    public $fields;
    public $styling;
    protected string $view = 'views/search';

    public function mount()
    {
        $this->data = $this->filterByFields();
    }

    private function filterByFields()
    {
        $filteredData = '';

        foreach ($this->data as $item) {
            $value = '';

            for ($i = 0; $i < count($this->fields); $i++) {
                $value .= $item->{$this->fields[$i]};
                if ($i !== count($this->fields) - 1) {
                    $value .= ' ';
                }
            }

            if ($item === $this->data[count($this->data) - 1]) {
                $filteredData .= '"' . $value . '"';
            } else {
                $filteredData .= '"' . $value . '",';
            }
        }

        return $filteredData;
    }
}
