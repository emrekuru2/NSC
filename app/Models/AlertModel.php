<?php

namespace App\Models;

use CodeIgniter\Model;

class AlertModel extends Model
{
    // Construction
    protected $table         = 'nsca_alerts';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\Alert::class;
    protected $protectFields = true;
    protected $allowedFields = ['title', 'content', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions

    public function disable(int $id): bool
    {
        return ($this->update($id, ['status' => 0])) ? true : false;
    }
}
