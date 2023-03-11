<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlertModel;

class AlertsController extends BaseController
{
    public function index()
    {
        $alerts = model(AlertModel::class);

        $data = [
            'title' => 'Alerts',
            'alerts' => $alerts->findAll(),
            'active' => $alerts->where('status', 1)->first()
        ];


        return view('pages/admin/alerts', $data);
    }

    public function createAlert()
    {
    }

    public function setAlert()
    {
        $current = $this->request->getVar('flexRadioDefault');
        $alert = model(AlertModel::class);
        $active = $alert->where('status', 1)->first();

        if ($active) {
            $alert->deactivate($active->id);
        }



        if ($alert->update($current, ['status' => 1])) {

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function removeAlert(int $id)
    {
    }
}
