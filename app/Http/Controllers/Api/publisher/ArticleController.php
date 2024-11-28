<?php

namespace App\Http\Controllers\Api\publisher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(private ArticleService $articleService)
    {
    }

    public function create(CreateArticleRequest $request)
    {
        $user = $this->articleService->create($request->validated());
        return messageSuccessResponse("the operation was completed successfully");
    }
}
