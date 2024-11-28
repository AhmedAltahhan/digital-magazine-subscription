<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function all()
    {
        $comments = Comment::paginate(request()->input('per_page', 10));
        return $comments;
    }

    public function store(array $data)
    {
        return Comment::updateOrCreate([], $data);
    }

    public function create(array $data)
    {
        return Comment::create($data);
    }

    public function show(string $id)
    {
        $subscription = Comment::findOrFail($id);
        return $subscription;
    }

    public function destroy(string $id)
    {
        Comment::whereId($id)->delete();
    }


}
