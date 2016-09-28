<?php
/**
 * Created by PhpStorm.
 * User: zhouweiyong
 * Date: 16/9/5
 * Time: 下午10:00
 */

namespace app\index\controller;

//给User模型取别名,是为了不跟本类起冲突
use app\index\model\User as UserModel;

/**
 * 模型跟数据库表格关联
 * 通过模型操作数据库
 */
class UserControl
{
    //新增用户数据
    public function add()
    {
        $user = new UserModel();
        $user->nickname = "zwy";
        $user->email = "zwy@163.com";
        $user->birthday = strtotime("1977-03-05");
        $user->create_time = strtotime("2016-07-08");
        if ($user->save()) {
            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        } else {
            return $user->getError();
        }
    }

    //新增用户
    public function add2()
    {
        $user["nickname"] = "wiikkk";
        $user["email"] = "wiikkk@163.com";
        $user["birthday"] = strtotime("2015-04-03");
        if ($result = UserModel::create($user)) {
            return '用户[ ' . $result->nickname . ':' . $result->id . ' ]新增成功';
        } else {
            return '新增出错';
        }
    }

    //批量新增用户数据
    public function add3()
    {
        $user = new UserModel();
        $list = [
            ["nickname" => "张三", "email" => "zhangsan@qq.com", "birthday" => strtotime("2015-01-15")],
            ["nickname" => "李四", "email" => "lisi@qq.com", "birthday" => strtotime("1990-09-19")],
        ];
        if ($user->saveAll($list)) {
            return '用户批量新增成功';
        } else {
            return $user->getError();
        }
    }

    //读取用户数据
    public function read($id = 1)
    {
        $user = UserModel::get($id);

        //通过对象的方式读取字段值
        echo $user->nickname;
        //通过数组方式读取字段值
        echo $user["email"];
        return json($user);
    }

    //通过昵称读取用户数据
    public function read2($nickname = "zwy")
    {
        $user = UserModel::getByNickname($nickname);

        return json($user);
    }

    //更复杂的查询则可以使用查询构建器来完成
    public function read3()
    {
        $user = UserModel::where("nickname", "zwy")->find();

        return json($user);
    }

    //获取用户数据列表
    public function read4()
    {
        $list = UserModel::all();
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }
    }

    //根据条件获取用户数据列表
    public function read5()
    {
        $list = UserModel::all(["status" => 0]);
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }
    }

    //使用数据库的查询构建器完成更多的条件查询
    public function read6()
    {
        $list = UserModel::where('id', '<', 3)->select();
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }
    }


    //更新用户数据
    public function update()
    {
        $id = 5;
        $user = UserModel::get($id);
        $user->nickname = "wanggggg";
        if ($user->save()) {
            return '更新用户成功';
        } else {
            return $user->getError();
        }
    }

    public function update2()
    {
        $user["id"] = 2;
        $user["nickname"] = "houyonggui";
        if (UserModel::update($user)) {
            return '更新用户成功';
        } else {
            return $user->getError();
        }
    }

    //删除用户数据
    public function delete()
    {
        $user = UserModel::get(1);
        if ($user) {
            $user->delete();
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }

    // 删除用户数据
    public function delete2()
    {
        $id = 2;
        $result = UserModel::destroy($id);
        if ($result) {
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }

    public function delete3()
    {
        echo strtotime("2016-06-18");
    }
}