<?php


namespace app\traits;


trait DropDown
{

    public function status(){
        return [
            '0' => 'Нет информации',
            '1' => 'Мужской',
            '2' => 'Женский',
        ];
    }

}