<?php
namespace App\Models;

use CodeIgniter\Model;

class CompetitionModel extends Model
{
    protected $table            = 'nsca_competitions';
    protected $primaryKey       = 'id';
    protected $foreignkey       = "typeID";
    protected $returnType       = \App\Entities\Competition::class;
    protected $allowedFields    = ['typeID', 'name','description','yearRunning'];

    public function getAllClubs()
    {
        return $this->findAll();
    }
}