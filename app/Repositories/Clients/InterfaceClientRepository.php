<?php
namespace App\Repositories\Clients;

interface InterfaceClientRepository
{
    public function getAll();
    public function getById($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);
    public function active($id);
    public function unactive($id);
    public function getByFilter($filter);
    public function getDropdown();

}
?>