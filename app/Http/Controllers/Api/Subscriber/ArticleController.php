<?php

namespace App\Http\Controllers\Api\Subscriber;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(private ArticleService $articleService)
    {
    }

    public function index()
    {
        $articles = $this->articleService->all();
        $data = ArticleResource::collection($articles);
        return paginateSuccessResponse($data, "subscriptions found successfuly");
    }
}
