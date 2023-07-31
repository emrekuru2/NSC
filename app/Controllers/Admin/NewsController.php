<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class NewsController extends BaseController
{
    public function index()
    {
        $newsModel = new \App\Models\NewsModel();
        $newsModel1 = model(NewsModel::class);
        $userModel = model(userModel::class);
        $news = $newsModel->getNews()->findAll();

        $orderBy = $this->request->getGet('order_by');
        $orderBy = in_array($orderBy, ['latest', 'oldest']) ? $orderBy : 'latest';

        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');
        $postedBy = $this->request->getGet('posted_by');
        $searchTitle = $this->request->getGet('search_title');

        $data = [
            'title' => 'News',
            'news'  => $newsModel1->getFilteredNews($orderBy, $startDate, $endDate, $postedBy, $searchTitle)->paginate(5),
            'editMode' => false,
            'orderBy' => $orderBy,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'postedBy' => $postedBy,
            'searchTitle' => $searchTitle,
            'userList' => $userModel->findAll(),
        ];

        return view('pages/admin/news', $data);
    }

    public function editMode(int $id)
    {
        $data = [
            'title'        => 'News',
            'currentNews'  => model(NewsModel::class)->find($id),
            'news'         => model(NewsModel::class)->findAll(),
            'editMode'     => true
        ];

        return view('pages/admin/news', $data);
    }


    public function update(int $id)
    {
        return (model(NewsModel::class)->update($id, $this->request->getPost()))
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'News updated successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'News could not be updated']);
    }


    public function create()
    {
        $title   = $this->request->getVar('title');
        $content = $this->request->getVar('content');
        $userID  = auth()->id();

        $news          = new \App\Entities\News();
        $news->userID  = $userID;
        $news->title   = $title;
        $news->content = $content;

        $newsModel = model(NewsModel::class);

        if ($newsModel->save($news)) {
            $data = [
                'type'    => 'success',
                'content' => 'News created successfully',
            ];

            return redirect()->back()->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'News could not be created',
        ];

        return redirect()->back()->with('alert', $data);
    }
}
