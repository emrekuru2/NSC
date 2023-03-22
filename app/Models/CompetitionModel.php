<?php
namespace App\Models;

use CodeIgniter\Model;

class CompetitionModel extends Model
{
    protected $table            = 'nsca_competition';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name','description','compTypeID','YearRunning','competitionType'];

    public function getAllClubs()
    {
        return $this->findAll();
    }
}