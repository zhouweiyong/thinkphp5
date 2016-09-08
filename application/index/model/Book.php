<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/8
 * Time: 下午11:45
 */

namespace app\index\model;


use think\Model;

class Book extends Model
{
    protected $table="think_book";

    protected $insert=[
        "status"=>1
    ];

    public function user(){
        return $this->belongsTo("User");
    }
}