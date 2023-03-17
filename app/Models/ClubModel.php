<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubModel extends Model
{
  // Construction
  protected $table            = 'nsca_clubs';
  protected $primaryKey       = 'id';
  protected $returnType       = \App\Entities\Club::class;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'name',
    'abbreviation',
    'website',
    'description',
    'email',
    'phone',
    'facebook',
    'image'
  ];

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
}
