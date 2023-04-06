<?php

namespace App\Models;

use CodeIgniter\Model;

class DevModel extends Model
{
    protected $table         = 'nsca_devs';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\Dev::class;
    protected $protectFields = true;
    protected $allowedFields = ['name', 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'price', 'location', 'image', 'daysRun', 'typeID'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function programs()
    {
        return $this->orderBy('start_date', 'ASC')
            ->join('nsca_dev_types', 'nsca_dev_types.id = nsca_devs.typeID', 'left')
            ->findAll();
    }

    public function getUsers(int $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nsca_dev_users');
        $builder->select('nsca_dev_users.*, nsca_users.*');
        $builder->join('nsca_users', 'nsca_users.id = nsca_dev_users.userID');
        $builder->where('nsca_dev_users.devID', $id);
        $query = $builder->get();

        return $query->getResult();
    }
}
