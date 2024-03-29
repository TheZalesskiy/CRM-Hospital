<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{

    protected $model;

    public function getAll($collumns = array('*'))
    {
        return $this->model->get($collumns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->where("id", '=', $id)->update($data);
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
}
