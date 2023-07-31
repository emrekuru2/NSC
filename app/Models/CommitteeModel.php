<?php

namespace App\Models;

use CodeIgniter\Model;

class CommitteeModel extends Model
{
    // Construction
    protected $table         = 'nsca_committees';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\Committee::class;
    protected $protectFields = true;
    protected $allowedFields = ['name', 'description', 'start_date', 'end_date', 'years', 'image'];

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

    public function getMembers(int $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nsca_committee_users');
        $builder->select('nsca_users.first_name, nsca_users.last_name');
        $builder->join('nsca_users', 'nsca_committee_users.userID = nsca_users.id');
        $builder->where('nsca_committee_users.committeeID', $id);
        $query = $builder->get();
    
        return $query->getResult();
    }
}

