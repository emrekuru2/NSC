<?php

namespace App\Models;

use CodeIgniter\Model;

class DevModel extends Model
{
    protected $table            = 'nsca_devs';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Dev::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'price', 'location', 'image', 'daysRun', 'programID'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function programs() {
        return $this->orderBy('start_date', 'ASC')
        ->join('nsca_dev_types', 'nsca_dev_types.id = nsca_devs.typeID', 'left')
        ->findAll();
    }
}
