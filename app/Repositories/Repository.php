<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;

class Repository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $item = $this->model->find($id);
        if ($item) {
            $updated = $item->fill($data)->save();
            if ($updated) {
                return true;
            }
        }
        return false;
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        if ($item) {
            $deleted = $item->delete();
            if ($deleted) {
                return true;
            }
        }
        return false;
    }

    public function preview($id)
    {
        return $this->model->find($id);
    }

}