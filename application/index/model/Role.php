<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/24
 * Time: 上午11:42
 */

namespace app\index\model;


use think\Model;

class Role extends Model
{

    protected $table = "think_role";
    // 设置数据表主键
    protected $pk = "id";

    public function users(){
        return $this->belongsToMany("User","think_access");
    }
}