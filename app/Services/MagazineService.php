<?php

namespace App\Services;

use App\Models\Magazine;

class MagazineService
{
    public function all()
    {
        $magazines = Magazine::paginate(request()->input('per_page', 10));
        return $magazines;
    }

    public function store(array $data)
    {
        return Magazine::updateOrCreate(['id' =>$data['id']], $data);
    }

    public function create(array $data)
    {
        return Magazine::create($data);
    }

    public function show(string $id)
    {
        $subscription = Magazine::findOrFail($id);
        return $subscription;
    }

    public function destroy(string $id)
    {
        Magazine::whereId($id)->delete();
    }


}
