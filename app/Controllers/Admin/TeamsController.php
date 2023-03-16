<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use Exception;
use function MongoDB\BSON\toJSON;

class TeamsController extends BaseController
{
    public function index()
    {
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            'allTeams' => $teamModel->orderBy('nsca_teams.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function getTeam(int $teamID) {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);

        $team = $teamModel->find($teamID);
        $teamMembers = $userModel->getTeamUsersByTeamId($teamID);

        $data = [
            'title' => 'Teams',
            'team' => $team,
            'teamMembers' => $teamMembers,
            'allTeams' => $teamModel->orderBy('nsca_teams.name', 'ASC')->findAll(),
            //'clubMembers' => $clubMembers,
            'allClubs' => $clubModel->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

}