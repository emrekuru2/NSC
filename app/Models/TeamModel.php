<?php

namespace App\Models;

use CodeIgniter\Database\OCI8\Builder;
use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class TeamModel extends Model
{
    protected $table            = 'nsca_teams';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Team::class;
    protected $allowedFields    = ['name', 'description', 'image'];

}
