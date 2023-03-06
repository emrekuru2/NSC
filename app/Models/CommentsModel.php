<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table            = 'nsca_news_comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\Comment::class;
    protected $allowedFields    = ['newsID', 'userID', 'comment'];
    protected $useTimestamps = true;


    public function getComments(int $id)
    {
        return $this->select('nsca_news_comments.id, first_name, last_name, comment')
                    ->join('nsca_users', 'nsca_news_comments.userID = nsca_users.id', 'left')
                    ->where('newsID', $id);
    }
}
