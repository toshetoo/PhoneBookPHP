<?php

require_once('../Entities/BaseEntity.php');

abstract class BaseRepository
{
    public function getAll(){

    }
    public function insert(BaseEntity $item){

    }

    public function update(BaseEntity $item){

    }

    public function save (BaseEntity $item){
        if($item->id!=null)
            $this->update($item);
        else
            $this->insert($item);
    }

    public function delete(BaseEntity $item){

    }
}