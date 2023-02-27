<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->paginate(5),
            'pager' => $model->pager,
            'title' => 'News',
        ];

        return view('pages/news', $data);
    }

    

    
}
