<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    // Construction
    protected $table         = 'nsca_news_comments';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\Comment::class;
    protected $protectFields = true;
    protected $allowedFields = ['newsID', 'userID', 'comment'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions
    public function getComments(int $id)
    {
        return $this->select('nsca_news_comments.id, first_name, last_name, image, comment')
            ->join('nsca_users', 'nsca_news_comments.userID = nsca_users.id', 'left')
            ->where('newsID', $id);
    }
}
