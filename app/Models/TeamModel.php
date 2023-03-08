<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table            = 'nsca_team';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Team::class;
    protected $allowedFields    = ['name', 'description', 'image'];

    
}
