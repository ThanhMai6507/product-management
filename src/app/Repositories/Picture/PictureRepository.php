<?php

namespace App\Repositories\Picture;

use App\Models\Pictures;
use App\Repositories\BaseRepository;

class PictureRepository extends BaseRepository implements PictureRepositoryInterface
{
    public function getModel()
    {
        return Pictures::class;
    }
}
