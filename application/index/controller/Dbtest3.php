<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/8
 * Time: 下午10:01
 */

namespace app\index\controller;

use app\index\model\Book;
use app\index\model\Profile;
use app\index\model\User;
use think\Controller;

/**
 * 1,关联
 */
class Dbtest3 extends Controller
{

    //-------------一对一------------------------
    //一个用户对应一份档案
    //添加
    public function add()
    {
        $user = new User();
        $user->nickname = "zcccc";
        $user->email = "zcccc@qq.com";
        $user->birthday = strtotime("1985-02-15");
        if ($user->save()) {
            $profile = new Profile();
            $profile->truename = "zhaoch";
            $profile->birthday = strtotime("1985-02-15");
            $profile->address = "深圳";
            $profile->email = "zhaoch@126.com";
            $user->profile()->save($profile);
            return "用户添加成功";
        } else {
            return $user->getError();
        }
    }

    //查询
    public function read()
    {
        $id = input("get.id");
        $user = User::get($id);
        echo $user;
        dump($user->profile->email);
        echo $user->profile;
    }

    //更新
    public function update($id)
    {
        $user = User::get($id);
        $user->nickname = "upzzccccccccccccc";
        $user->profile->email = "upzzzzz@123.com";
        if ($user->profile->save() && $user->save()) {
            return "用户更新成功";
        } else {
            return $user->getError();
        }
    }

    public function delete($id)
    {
        $user = User::get($id);
        if ($user->profile->delete() && $user->delete()) {
            return "用户删除成功";
        } else {
            return "用户删除失败";
        }
    }
    //-------------一对一------------------------


    //-------------一对多------------------------
    //一个用户对应多本图书
    //添加
    public function add2()
    {
        $id = 3;
        $user = User::get($id);
        $book = new Book();
        $book->title = "Think in java";
        $book->publish_time = strtotime("1997-02-21");
        if ($user->books()->save($book)) {
            return "图书添加成功";
        } else {
            return "图书添加失败";
        }
    }

    //批量添加
    public function add3()
    {
        $id = 3;
        $user = User::get($id);
        $books = [
            ["title" => "红楼梦", "publish_time" => strtotime("1998-03-16")],
            ["title" => "西游记", "publish_time" => strtotime("2001-03-16")],
        ];
        if ($user->books()->saveAll($books)) {
            return "图书添加成功";
        } else {
            return "图书添加失败";
        }

    }

    //查询
    public function read2($id){
        $user = User::get($id,"books");
        $books = $user->books;
         return json( $books);
    }
    //-------------一对多------------------------


}