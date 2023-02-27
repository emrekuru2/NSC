<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'nsca_news';
    protected $primaryKey       = 'NewsID';

    public function getAllNews()
    {
        return $this->findAll();
    }
}
