<?php

namespace App\Http\Controllers\Api\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {
        $id = Auth::user()->id;
        $subscriptions = $this->userService->all($id);
        $data = UserResource::collection($subscriptions);
        return paginateSuccessResponse($data, "users found successfuly");
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->create($request->validated());
        return messageSuccessResponse("created completed successfully");
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $this->userService->update($request->validated());
        return messageSuccessResponse("update completed successfully");
    }

    public function show(string $id)
    {
        $subscription = $this->userService->show($id);
        $data = UserResource::make($subscription);
        return successResponse($data, "user found successfuly");
    }

    public function destroy(string $id)
    {
        $this->userService->destroy($id);
        return messageSuccessResponse("deleted completed successfully");
    }

}
