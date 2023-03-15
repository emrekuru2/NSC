<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use Exception;

class TeamsController extends BaseController
{
    public function index()
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);

        $team = null;
        $teamMembers = null;
        $clubMembers = null;

        try {
            $teamName = $this->request->getGet('name')[0];

            $team = $teamModel->findTeamByName($teamName);
            $teamMembers = $userModel->getTeamUsersByTeamName($teamName);
            $clubMembers = $userModel->getClubUsersByClubName($teamName);
        } catch (Exception $e) {

        }

        $data = [
            'title' => 'Teams',
            'team' => $team,
            'teamMembers' => $teamMembers,
            'allTeams' => $teamModel->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'clubMembers' => $clubMembers,
            'allClubs' => $clubModel->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

}