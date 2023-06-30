<?php

namespace App\Entities;

use App\Models\TeamModel;
use App\Models\UserTypes\ClubUserModel;
use CodeIgniter\Entity\Entity;

use function PHPUnit\Framework\isEmpty;

class Club extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];

    private ?array $teams   = null;
    private ?array $members = null;

    private function populateTeams(): void
    {
        if ($this->teams === null) {
            $teamModel = model(TeamModel::class);

            $this->teams = $teamModel->getTeamsByClubID($this->id);
        }
    }

    private function populateMembers(): void
    {
        if ($this->members === null) {
            $clubUserModel = model(ClubUserModel::class);

            $this->members = $clubUserModel->getMembersByID($this->id);
        }
    }

    public function getUnassignedTeams(): array
    {
        $teamModel = model(TeamModel::class);

        return $teamModel->where('clubID !=', $this->id)->findAll();
    }

    public function getUnassignedMembers(): array
    {
        $clubUserModel = model(ClubUserModel::class);

        $clubUsers = $clubUserModel->where('clubID !=', $this->id)->findAll();

        if (sizeof($clubUsers) > 0) {
            return model(UserModel::class)->findAll();
        } else {
            return $this->filterMembers();
        }
    }

    private function filterMembers(): array
    {
        $result = [];
        
        // return array_map(function ($member) {
        //     return model(UserModel::class)->where()
        // }, $this->members)
      
        foreach (model(UserModel::class)->findAll() as $user) {
            foreach ($this->members as $member) {
                if ($member->id === $user->id) {
                    array_push($result, $user);
                }
            }
        }

        return $result;
    }

    public function getTeams(): array
    {
        $this->populateTeams();

        return $this->teams;
    }

    public function getMembers(): array
    {
        $this->populateMembers();

        return $this->members;
    }
}
