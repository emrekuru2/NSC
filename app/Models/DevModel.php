<?php

namespace App\Models;

use CodeIgniter\Model;

class DevModel extends Model
{
    protected $table            = 'nsca_dev';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Dev::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'price', 'location', 'image', 'daysRun', 'devProgID'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUsers(int $id){
        $db = \Config\Database::connect();
        $builder = $db->table('nsca_dev_user');
        $builder->select('nsca_dev_user.*, nsca_users.*');
        $builder->join('nsca_users', 'nsca_users.id = nsca_dev_user.userID');
        $builder->where('nsca_dev_user.devID', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}