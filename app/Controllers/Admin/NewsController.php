<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class NewsController extends BaseController
{
    public function index()
{
    $newsModel = new \App\Models\NewsModel();
    $news = $newsModel->getNews()->findAll();

    $data = [
        'title' => 'News',
        'news'  => $news,
        'editMode' => false
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
            ? redirect()->back()->with('news', ['type' => 'success', 'content' => 'News updated successfully'])
            : redirect()->back()->with('news', ['type' => 'danger', 'content' => 'News could not be updated']);
    }


    public function createNews()
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
