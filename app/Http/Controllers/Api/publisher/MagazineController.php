<?php

namespace App\Http\Controllers\Api\publisher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Magazine\CreateMagazineRequest;
use App\Services\MagazineService;

class MagazineController extends Controller
{
    public function __construct(private MagazineService $magazineService)
    {
    }

    public function create(CreateMagazineRequest $request)
    {
        $user = $this->magazineService->create($request->validated());
        return messageSuccessResponse("created completed successfully");
    }
}
