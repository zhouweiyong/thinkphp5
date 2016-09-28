<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/7
 * Time: 下午10:08
 */

namespace app\index\controller;


use app\index\model\Student;
use app\index\model\User;
use think\Config;
use think\Controller;
use think\View;

/**
 * 表单提交和验证
 * 
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

    public function show(){
        $list = User::all();
        $this->assign("list",$list);
        $this->assign("count",count($list));
//        return view();
        return $this->fetch();
    }

    public function show2(){
        $list = User::paginate(3);
        $this->assign("list",$list);
        return $this->fetch();
    }
    
    public function show3($id){
        $user = User::get($id);
        $this->assign("user",$user);
        return $this->fetch();
    }


    public function show4(){
        echo config("project.titleeee");
    }
}