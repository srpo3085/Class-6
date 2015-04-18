<?php


class publicacion extends Eloquent{
    protected $table='publicacion';

    public function freshTimestamp(){
        return date('Y-m-d h:m:s');
    }
}