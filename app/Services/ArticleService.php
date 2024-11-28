<?php

namespace App\Services;

use App\Mail\SubscriptionMail;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;

class ArticleService
{
    public function all()
    {
        $articles = Article::paginate(request()->input('per_page', 10));
        return $articles;
    }

    public function store(array $data)
    {
        return Article::updateOrCreate([], $data);
    }

    public function create(array $data)
    {
        return Article::create($data);
    }

    public function show(string $id)
    {
        $subscription = Article::findOrFail($id);
        return $subscription;
    }

    public function destroy(string $id)
    {
        Article::whereId($id)->delete();
    }


}
