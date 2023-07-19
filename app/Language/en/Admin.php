<?php

return [
    ...operationsEN(
        'Alert',
        [
            'create',
            'update',
            'delete',
            'enable',
            'disable'
        ],
        ['isset' => 'Please select an alert to activate']
    ),
    ...operationsEN(
        'Club',
        [
            'create',
            'update',
            'delete',
            'addMember',
            'removeMember',
            'addTeam',
            'removeTeam',
            'addManager',
            'removeManager'
        ],
        [
            'foreignKey' => 'Teams and Members must be removed before deleting a club.',
            'requiredTeams' => 'Please select at least one team to proceed',
            'requiredUsers' => 'Please select at least one user to proceed',
        ]
    ),
    ...operationsEN(
        'Competition',
        [
            'create',
            'update',
            'delete',
        ]
    ),
    ...operationsEN(
        'Competition_Type',
        [
            'create',
            'update',
            'delete',
        ],
        [
            'foreignKey' => 'Competitions must be removed before deleting a club.',
        ]
    ),


];
