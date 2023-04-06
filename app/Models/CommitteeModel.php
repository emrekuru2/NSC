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
    protected $allowedFields = ['name', 'description', 'years', 'image'];

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
        $db      = \Config\Database::connect();
        $builder = $db->table('nsca_committee_users');
        $builder->select('nsca_committee_users.*, nsca_users.*');
        $builder->join('nsca_users', 'nsca_users.id = nsca_committee_users.userID');
        $builder->where('nsca_committee_users.committeeID', $id);
        $query = $builder->get();
        // convert to string seperated by commas
        return $query->getResult();
    }
}
