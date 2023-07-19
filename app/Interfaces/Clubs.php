<?php

namespace App\Interfaces;

interface Clubs
{
    public function addMember();

    public function removeMember(int $param);

    public function addManager(int $param);

    public function removeManager(int $param);

    public function addTeam();

    public function removeTeam(int $param);
}
