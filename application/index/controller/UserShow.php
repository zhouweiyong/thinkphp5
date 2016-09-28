<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/26
 * Time: 下午9:17
 */

namespace app\index\controller;


use app\index\model\User;
use think\Controller;

/**
 * 模型输出
 */
class UserShow extends Controller
{

    public function read($id){
        $user = User::get($id);
        dump($user->toArray());
    }

    public function read2($id){
        $user = User::get($id);
        echo $user->toJson();
    }
}