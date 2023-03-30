<?php

namespace App\Entities;

use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserTypes\ClubUserModel;
use App\Models\UserTypes\TeamUserModel;
use CodeIgniter\Shield\Entities\User as ShieldUser;
use CodeIgniter\Shield\Models\PermissionModel;

class User extends ShieldUser
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];

    public function setRole(string $role)
    {
        $this->attributes['role'] = $role;

        return $this;
    }

    public function setTeam(string $team)
    {
        $this->attributes['inTeam'] = $team;

        return $this;
    }

    public function setClub(string $club)
    {
        $this->attributes['inClub'] = $club;

        return $this;
    }

    public function getRole()
    {
        $roleModel = model(PermissionModel::class);
        $this->setRole($roleModel->getForUser($this)[0]);

        return $this->attributes['role'];
    }

    public function getTeam()
    {
        $teamUser = model(TeamUserModel::class)->find($this->attributes['id']);
        $team     = model(TeamModel::class)->find($teamUser->teamID);
        $this->setTeam($team->name ?? 'none');

        return $this->attributes['inTeam'];
    }

    public function getClub()
    {
        $clubUser = model(ClubUserModel::class)->find($this->attributes['id']);
        $club     = model(ClubModel::class)->find($clubUser->clubID);
        $this->setClub($club->name ?? 'none');

        return $this->attributes['inClub'];
    }
}
