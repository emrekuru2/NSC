<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlertModel;
use \App\Entities\Alert;

class AlertsController extends BaseController
{
    protected $helpers = ['html', 'text', 'form'];
    protected $alertModel;
    protected $activeAlert;
    protected $totalAlerts;

    public function __construct()
    {
        $this->alertModel  = new AlertModel();
        $this->totalAlerts = $this->alertModel->findAll();
        $this->activeAlert = $this->alertModel->where('status', 1)->first();
    }

    /**
     * @return string
     */
    public function index()
    {
        $data = [
            'title'  => 'Alerts',
            'alerts' => $this->totalAlerts,
            'active' => $this->activeAlert,
        ];

        return view('pages/admin/alerts', $data);
    }

    /**
     * @param string $param
     * 
     * @return string
     */
    public function read(string $param)
    {
        $data = [
            'title'        => 'Alerts',
            'alerts'       => $this->totalAlerts,
            'active'       => $this->activeAlert,
            'currentAlert' => $this->alertModel->where('title', $param)->first(),
        ];

        return view('pages/admin/alerts', $data);
    }

    /**
     * @return RedirectResponse
     */
    public function create()
    {
        $newAlert = new Alert($this->request->getPost());

        return ($this->alertModel->save($newAlert))
            ? toast('success', lang('Admin.alerts.create.success'))
            : toast('danger', lang('Admin.alerts.create.error'));
    }


    /**
     * @param int $id
     * 
     * @return RedirectResponse
     */
    public function update(int $id)
    {
        return ($this->alertModel->update($id, $this->request->getPost()))
            ? toast('success', lang('Admin.alerts.update.success'))
            : toast('danger', lang('Admin.alerts.update.error'));
    }

    /**
     * @return RedirectResponse
     */
    public function enable()
    {
        $selectedAlert = $this->request->getVar('selectedAlert');

        if (!isset($selectedAlert)) {
            return toast('danger', lang('Admin.alerts.enable.isset'));
        }

        if (isset($this->activeAlert)) {
            $this->alertModel->disable($this->activeAlert->id);
        }

        return ($this->alertModel->update($selectedAlert, ['status' => 1]))
            ? toast('success', lang('Admin.alerts.enable.success'))
            : toast('danger', lang('Admin.alerts.enable.error'));
    }

    /**
     * @param int $id
     * 
     * @return RedirectResponse
     */
    public function disable(int $id)
    {
        return ($this->alertModel->disable($id))
            ? toast('success', lang('Admin.alerts.disable.success'))
            : toast('danger', lang('Admin.alerts.disable.error'));
    }

    /**
     * @param int $id
     * 
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        return ($this->alertModel->delete($id))
            ? toast('success', lang('Admin.alerts.delete.success'))
            : toast('danger', lang('Admin.alerts.delete.error'));
    }
}
