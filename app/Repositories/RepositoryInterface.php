<?php

namespace App\Repositories;

interface RepositoryInterface
{

    public function all();
    
    public function create(array $data);
    
    public function delete($id);

    public function getModel();
    
    public function preview($id);

    public function update(array $data, $id);

}