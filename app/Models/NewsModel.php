<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table         = 'nsca_news';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\News::class;
    protected $protectFields = true;
    protected $allowedFields = ['userID', 'title', 'content'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getNews($orderBy = 'latest')
    {
        $query = $this->select('nsca_news.id, first_name, last_name, title, content, nsca_news.created_at')
            ->join('nsca_users', 'nsca_news.userID = nsca_users.id', 'left');

        if ($orderBy == 'latest') {
            $query->orderBy('nsca_news.created_at', 'DESC');
        } elseif ($orderBy == 'oldest') {
            $query->orderBy('nsca_news.created_at', 'ASC');
        }

        return $query;
    }

    public function getNewsByID(int $id)
    {
        return $this->select('nsca_news.id, first_name, last_name, image, title, content, nsca_news.created_at')
            ->join('nsca_users', 'nsca_news.userID = nsca_users.id', 'left')->find($id);
    }

    public function getFilteredNews($orderBy = 'latest', $startDate = null, $endDate = null, $postedBy = null, $searchTitle = null)
    {
        $query = $this->select('nsca_news.id, first_name, last_name, title, content, nsca_news.created_at')
            ->join('nsca_users', 'nsca_news.userID = nsca_users.id', 'left');

        if ($orderBy == 'latest') {
            $query->orderBy('nsca_news.created_at', 'DESC');
        } elseif ($orderBy == 'oldest') {
            $query->orderBy('nsca_news.created_at', 'ASC');
        }

        if ($startDate) {
            $query->where('nsca_news.created_at >=', $startDate . ' 00:00:00');
        }

        if ($endDate) {
            $query->where('nsca_news.created_at <=', $endDate . ' 23:59:59');
        }

        if ($postedBy) {
            $query->where('nsca_news.userID', $postedBy);
        }

        if ($searchTitle) {
            $query->like('nsca_news.title', $searchTitle);
        }

        return $query;
    }
}
