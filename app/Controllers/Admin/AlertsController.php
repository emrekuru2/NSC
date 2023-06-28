<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlertModel;

class AlertsController extends BaseController
{
    protected $helpers = ['html', 'text', 'form'];

    public function index()
    {
        $data = [
            'title'  => 'Alerts',
            'alerts' => model(AlertModel::class)->findAll(),
            'active' => model(AlertModel::class)->where('status', 1)->first(),
        ];

        return view('pages/admin/alerts', $data);
    }

    public function read(string $param)
    {
        $data = [
            'title'  => 'Alerts',
            'currentAlert' => model(AlertModel::class)->where('title', $param)->first(),
            'alerts' => model(AlertModel::class)->findAll(),
            'active' => model(AlertModel::class)->where('status', 1)->first(),
        ];

        return view('pages/admin/alerts', $data);
    }

    public function create()
    {
        if (model(AlertModel::class)->save(new \App\Entities\User($this->request->getPost())) === false) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'content' => model(AlertModel::class)->errors()['title']]);
        }

        return  redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Alert created successfully']);
    }


    public function update(int $id)
    {
        return (model(AlertModel::class)->update($id, $this->request->getPost()))
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Alert updated successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Alert could not be updated']);
    }

    public function enable()
    {
        $current = $this->request->getVar('flexRadioDefault');

        if (!isset($current)) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'No alert was selected']);
        }

        $active  = model(AlertModel::class)->where('status', 1)->first();

        if ($active) {
            model(AlertModel::class)->disable($active->id);
        }

        return (model(AlertModel::class)->update($current, ['status' => 1]))
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Alert set successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Alert could not be set']);
    }

    public function disable(int $id)
    {
        return (model(AlertModel::class)->disable($id))
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Alert disabled successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Alert could not be disabled']);
    }

    public function delete(int $id)
    {
        return (model(AlertModel::class)->delete($id))
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Alert deleted successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Alert could not be deleted']);
    }
}
