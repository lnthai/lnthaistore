<?php
namespace App\Interface;
interface ModelInterface{
    public function insert($table, $data);
    public function update($table, $data, $cond, $condValue);
    public function delete($table, $cond, $condValue);
    public function getAll($table);
    public function getOne($table, $cond, $condValue);
} 