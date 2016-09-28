<?php
namespace app\index\model;

use think\Model;

class User extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = "think_user";
    // 设置数据表主键
    protected $pk = "id";
    // 设置当前数据表的字段信息
    protected $field = [
        "id" => "int",
        "birthday" => "int",
        "status" => "int",
        "create_time" => "int",
        "update_time" => "int",
        "nickname", "email",
    ];

    //指定自动写入时间戳的类型为timestamp类型
    //protected $autoWriteTimestamp = "datetime";

    /**
     *属性    描述
     * auto    新增及更新的时候自动完成的属性数组
     * insert    仅新增的时候自动完成的属性数组
     * update    仅更新的时候自动完成的属性数组
     */
    protected $insert = [
        "status" => 1,
    ];

    //定义关联方法:一对一
    public function profile(){
        return $this->hasOne("Profile");
    }

    //定义关联方法:一对多
    public function books(){
        return $this->hasMany("Book");
    }


    // 定义多对多关联
    public function roles(){
        return $this->belongsToMany("Role","think_access");
    }

}