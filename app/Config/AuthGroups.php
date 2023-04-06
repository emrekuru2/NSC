<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'guest';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * The available authentication systems, listed
     * with alias and class name. These can be referenced
     * by alias in the auth helper:
     *      auth('api')->attempt($credentials);
     */
    public array $groups = [
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Full Access (adding, editing, and deleting news, clubs, alert, subcommittees, development programs, user roles, team application and team list) through admin dashboard ',
        ],
        'manager' => [
            'title'       => 'Manager',
            'description' => 'Minimal Access + Can see `My club`, `Manage team` and `Join A Team`',
        ],
        'player' => [
            'title'       => 'Player',
            'description' => 'Minimal Access + Can see `My Team`, `Join A Team` and `Player Profile`',
        ],
        'umpire' => [
            'title'       => 'Umpire',
            'description' => 'Minimal Access + Can see `Join A Team`',
        ],
        'guest' => [
            'title'       => 'Guest',
            'description' => 'Minimal Access',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        // Actions
        'clubs.create'      => 'Can create clubs',
        'clubs.edit'        => 'Can edit clubs',
        'clubs.delete'      => 'Can delete clubs',
        'committees.create' => 'Can create committees',
        'committees.edit'   => 'Can edit committees',
        'committees.create' => 'Can delete committees',
        'devs.create'       => 'Can create development programs',
        'devs.create'       => 'Can edit development programs',
        'devs.delete'       => 'Can delete development programs',
        'teams.create'      => 'Can create teams',
        'teams.edit'        => 'Can edit teams',
        'teams.delete'      => 'Can delete teams',
        'teams.join'        => 'Can join teams',
        'teams.accept'      => 'Can accept a player join requests',
        'teams.reject'      => 'Can reject a player join requests',
        'teams.add'         => 'Can add a player to team',
        'teams.remove'      => 'Can remove a player from team',
        'users.create'      => 'Can create non-admin users',
        'users.edit'        => 'Can edit non-admin users',
        'users.delete'      => 'Can delete non-admin users',
        // Locations
        'admin.access'         => 'Can access the `Admin Panel` page',
        'myClub.access'        => 'Can access `My Club` page',
        'myTeam.access'        => 'Can access `My Team` page',
        'manageTeam.access'    => 'Can access `Manage Team` page',
        'playerProfile.access' => 'Can access `Player Profile` page',
        'profile.access'       => 'Can access `Profile` page',

    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'admin' => [
            'admin.*',
            'clubs.*',
            'committees.*',
            'devs.*',
            'teams.*',
            'users.*',
            'profile.*',
            'playerProfile.*',

        ],
        'manager' => [
            'myClub.access',
            'manageTeam.access',
            'teams.accept',
            'teams.reject',
            'teams.add',
            'teams.remove',
            'profile.access',
        ],
        'player' => [
            'teams.join',
            'myTeam.access',
            'playerProfile.access',
            'profile.access',
        ],
        'umpire' => [
            'teams.join',
            'profile.access',
        ],
        'guest' => [
            'profile.access',
        ],
    ];
}
