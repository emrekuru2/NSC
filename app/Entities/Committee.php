<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\UserModel;
use App\Models\UserTypes\CommitteeUserModel;


class Committee extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];

    private ?array $members = null;

    private function populateMembers(): void
    {
        if ($this->members === null) {
            $committeeUserModel = model(CommitteeUserModel::class);

            $this->members = $committeeUserModel->getMembersByID($this->id);
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

    public function getMembers() {
        $members = model(CommitteeUserModel::class)->where('committeeID', $this->id)->findAll();
        return $members;
    }

}
