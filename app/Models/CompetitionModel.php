<?php
namespace App\Models;

use CodeIgniter\Model;

class CompetitionModel extends Model
{
    protected $table            = 'nsca_competitions';
    protected $primaryKey       = 'id';
    protected $foreignkey       = "typeID";
    protected $allowedFields    = ['name','description','compTypeID','YearRunning','competitionType'];

    public function getAllClubs()
    {
        return $this->findAll();
    }
}