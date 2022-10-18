<?php

namespace App\Repositories;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($columns = '*', $relationShips = [], $isPagination = true) {
        $query = $this->model->orderBy('id', 'DESC')->select($columns);
            if($relationShips)
                $query = $query->with($relationShips);

            if($isPagination){
                $query = $query->paginate(Helper::count_per_page);
            } else {
                $query = $query->get();
            }
                
        return $query;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
    
    public function store($data)
    {
        $result = $this->model->create($data);
        return $result;
    }

    public function update($id, $data)
    {
        $result = $this->model->find($id);
        $result->update($data);
        return $result;
    }

    public function delete($id)
    {
        $result =  $this->model->find($id);
        if($result)
            $result->delete();

        return $result;
    }

    public function active($id)
    {
        $result =  $this->model->find($id);
        $result->update(['is_active' => true]);
        return $result;
    }

    public function unactive($id)
    {
        $result =  $this->model->find($id);
        $result->update(['is_active' => false]);
        return $result;
    }

}
?>