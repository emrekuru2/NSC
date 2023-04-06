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

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Functions

    public function deactivate(int $id)
    {
        $this->update($id, ['status' => 0]);
    }
}
