<?php

namespace App\Repositories\Product;

use App\Models\Products;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Products::class;
    }

    public function getPaginate($perPage = 25)
    {
        return $this->model->orderBy($this->model->getKeyName(), 'DESC')->paginate($perPage);
    }
}
