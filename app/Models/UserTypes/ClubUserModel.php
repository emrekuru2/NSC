<?php

namespace App\Models\UserTypes;

use CodeIgniter\Model;

class ClubUserModel extends Model
{
    protected $table         = 'nsca_club_users';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\UserTypes\ClubUser::class;
    protected $protectFields = true;
    protected $allowedFields = ['clubID', 'userID', 'isManager'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions
    public function deleteClubUsers(int $id): void
    {
        $this->where('clubID', $id)->delete();
    }

    public function getMembersByID(int $id): array
    {
        return $this->where('clubID', $id)->orderBy($this->primaryKey)->findAll();
    }
}
