<?php

namespace App\Http\Controllers\Api\Subscriber;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService)
    {
    }

    public function create(CreateCommentRequest $request)
    {
        $user = $this->commentService->create($request->validated());
        return messageSuccessResponse("created completed successfully");
    }
}
