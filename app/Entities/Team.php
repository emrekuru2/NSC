<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Team extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];
    private ?array $members = null;

 public function getUnassignedMembers(): array
    {
        if (empty($this->members)) {
            return model(UserModel::class)->findAll();
        } else {
            return $this->filterMembers();
        }
    }

    private function filterMembers(): array
    {
        $totalUsers = model(UserModel::class)->findAll();
        $nonMembers = [];

        foreach ($totalUsers as $user) {
            $isMember = false;

            foreach ($this->members as $member) {
                if ($member->userID === $user->id) {
                    $isMember = true;
                    break;
                }
            }

            if (!$isMember) {
                array_push($nonMembers, $user);
            }
        }

        return $nonMembers;
    }
}
