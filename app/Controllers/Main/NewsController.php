<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\UserModel;

class NewsController extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);
        $userModel = model(UserModel::class);

        $orderBy = $this->request->getGet('order_by');
        $orderBy = in_array($orderBy, ['latest', 'oldest']) ? $orderBy : 'latest';

        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');
        $postedBy = $this->request->getGet('posted_by');
        $searchTitle = $this->request->getGet('search_title');

        $data = [
            'news'        => $model->getFilteredNews($orderBy, $startDate, $endDate, $postedBy, $searchTitle)->paginate(5),
            'pager'       => $model->pager,
            'title'       => 'News',
            'orderBy'     => $orderBy,
            'startDate'   => $startDate,
            'endDate'     => $endDate,
            'postedBy'    => $postedBy,
            'searchTitle' => $searchTitle,
            'userList'    => $userModel->findAll(),
        ];

        return view('pages/main/news', $data);
    }

    public function getNewsByID(int $id)
    {
        $newsModel = model(NewsModel::class);
        $commentsModel = model(CommentModel::class);

        $news = $newsModel->getNewsByID($id);
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
