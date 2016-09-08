<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/8
 * Time: 下午10:05
 */

namespace app\index\model;


use think\Model;

class Profile extends Model
{
    protected $table = "think_profile";
    protected $pk = "id";

    protected $field=[
        "id"=>"int",
        "birthday"=>"int",
        "user_id"=>"int",
        "truename","address","email"
    ];
    public function user(){
        return $this->belongsTo("User");
    }
}