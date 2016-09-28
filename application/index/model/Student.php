<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/7
 * Time: 下午9:23
 */

namespace app\index\model;


use think\Model;

class Student extends Model
{
    protected $table = "zwy_student";
    // 设置数据表主键
    protected $pk = "id";
    // 设置当前数据表的字段信息
    protected $field = [
        "id" => "int",
        "studentName" => "varchar",
        "studentAge" => "int",
        "createTime" => "int"
    ];

    
}