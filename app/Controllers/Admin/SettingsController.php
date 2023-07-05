<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Settings',
            'user'  => auth()->user()
        ];

        return view('pages/admin/settings', $data);
    }

    public function backup()
    {
        helper('filesystem');
        $db = \Config\Database::connect();
        $dbname = $db->database;
        $path = WRITEPATH . 'uploads/';
        $filename = $dbname . '_' . date('d_M-Y');
        $prefs = ['filename' => $filename, 'format' => 'sql'];

        $util = (new \App\Database\Utils($db));
        $backup = $util->backup($prefs, $db);

        write_file($path . $filename . '.sql', $backup);
        return $this->response->download($path . $filename . '.sql', null);
    }
}
