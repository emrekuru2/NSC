<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class HomeController extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews()->paginate(3),
            'pager' => $model->pager,
            'title' => 'Home',
        ];

        return view('pages/main/home', $data);
    }
}
