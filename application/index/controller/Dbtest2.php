<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/7
 * Time: 下午8:55
 */

namespace app\index\controller;


use app\index\model\Student;
use think\Db;

/**
 * 1,测试数据库表字段是否可以用驼峰格式
 */
class Dbtest2
{


    public function add()
    {
        $student = new Student();
        $student->studentName = "winsonn";
        $student->studentAge = 23;
        $student->createTime = time();
        if ($student->save()) {
            echo "数据添加成功!";
        } else {
            echo "数据添加失败!";
        }
    }

    public function read()
    {
        $id = 1;
        $student = Student::get($id);
        echo date("Y-m-d H:i:s", $student->createTime);
        return json($student);
    }
}