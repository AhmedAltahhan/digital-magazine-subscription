<?php

namespace App\Http\Controllers\Api\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Magazine\StoreMagazineRequest;
use App\Http\Resources\MagazineResource;
use App\Services\MagazineService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagazineController extends Controller
{
    public function __construct(private MagazineService $magazineService)
    {
    }

    public function index()
    {
        $id = Auth::user()->id;
        $subscriptions = $this->magazineService->all($id);
        $data = MagazineResource::collection($subscriptions);
        return paginateSuccessResponse($data, "subscriptions found successfuly");
    }

    public function store(StoreMagazineRequest $request)
    {
        $user = $this->magazineService->store($request->validated());
        return messageSuccessResponse("the operation was completed successfully");
    }

    public function show(string $id)
    {
        $subscription = $this->magazineService->show($id);
        $data = MagazineResource::make($subscription);
        return successResponse($data, "subscription found successfuly");
    }

    public function destroy(string $id)
    {
        $this->magazineService->destroy($id);
        return messageSuccessResponse("the operation was completed successfully");
    }
}
