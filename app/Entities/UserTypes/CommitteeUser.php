<?php

namespace App\Entities\UserTypes;
use CodeIgniter\Entities\User;
use CodeIgniter\Entity\Entity;

class CommitteeUser extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];

    private ?User $user   = null;

    private function populateIdentity(): void
    {
        if ($this->user === null) {
            $userModel = model(UserModel::class);

            $this->user = $userModel->find($this->userID);
        }
    }

    public function getName(): string 
    {
        $this->populateIdentity();

        return $this->user->getFullName();
    }

    public function getFullName() 
    {
        $user = model(UserModel::class)->find($this->userID);
        return $user->getFullName();

    }


}
