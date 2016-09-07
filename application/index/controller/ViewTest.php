<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/7
 * Time: 下午10:08
 */

namespace app\index\controller;


use app\index\model\Student;
use think\Controller;
use think\View;

/**
 * 表单提交和验证
 */
class ViewTest extends Controller
{
    public function create()
    {
        return view();
    }

    public function add()
    {
        $student = new Student();
        $student->createTime = time();
        if ($student->validate(true)->save(input("post."))) {
            return json($student);
        } else {
            echo $student->getError();
        }

    }
}