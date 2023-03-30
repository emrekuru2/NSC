<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table         = 'nsca_teams';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\Team::class;
    protected $allowedFields = ['id', 'clubID', 'name', 'description', 'image'];
}
