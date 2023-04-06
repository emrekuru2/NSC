<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    // Construction
    protected $table         = 'nsca_news';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\News::class;
    protected $protectFields = true;
    protected $allowedFields = ['userID', 'title', 'content'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions
    public function getNews()
    {
        return $this->select('nsca_news.id, first_name, last_name, title, content, nsca_news.created_at')
            ->join('nsca_users', 'nsca_news.userID = nsca_users.id', 'left');
    }

    public function getNewsByID(int $id)
    {
        return $this->select('nsca_news.id, first_name, last_name, image, title, content, nsca_news.created_at')
            ->join('nsca_users', 'nsca_news.userID = nsca_users.id', 'left')->find($id);
    }
}
