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
            'news'  => $model->getNews()->paginate(5),
            'pager' => $model->pager,
            'title' => 'News',
        ];

        return view('pages/main/news', $data);
    }

    public function getNewsByID(int $id)
    {
        $newsModel     = model(NewsModel::class);
        $commentsModel = model(CommentModel::class);

        $news     = $newsModel->getNewsByID($id);
        $comments = $commentsModel->getComments($id);

        $data = [
            'news'     => $news,
            'comments' => $comments->paginate(8),
            'title'    => $news->title,
            'pager'    => $comments->pager,
        ];

        return view('pages/main/news_details', $data);
    }
}
