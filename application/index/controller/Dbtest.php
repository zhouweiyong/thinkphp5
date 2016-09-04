<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

/**
 * 学习数据库
 * 1, 数据库原生查询（SQL查询）；
 * 2,数据库链式查询（查询构造器）；
 * 3,模型的对象化查询；
 */
class Dbtest extends Controller
{
    //-----------------数据库原生查询--------------------------------
    //插入记录
    public function create()
    {
        $result = Db::execute("insert into zwy_data(name,status)values('hackkk',0)");
        dump($result);
    }

    //外部传入的变量,使用参数绑定机制
    public function create2()
    {
        $res = Db::execute("insert into zwy_data(name,status)values(?,?)", ["tommm", 1]);
        dump($res);
    }

    //外部传入的变量,使用命名占位符绑定
    public function create3()
    {
        $res = Db::execute("insert into zwy_data(name,status)values(:name,:status)", ["name" => "jackyyy", "status" => 1]);
        dump($res);
    }

    //更新
    public function update()
    {
        $result = Db::execute("update zwy_data set name = 'winsonnnn' where id = 4");
        dump($result);
    }

    //读取
    //原则上，读操作都使用query方法，写操作使用execute方法
    public function read()
    {
        $result = Db::query("select * from zwy_data");
//        dump($result);
        return json($result);
    }

    //外部传入的变量,使用参数绑定机制
    public function read2()
    {
        $res = Db::query("select * from zwy_data where id = ?", [2]);
        return json($res);
    }

    //外部传入的变量,使用命名占位符绑定
    public function read3()
    {
        $res = Db::query("select * from zwy_data where id = :id", ["id" => 3]);
        return json($res);
    }


    public function delete()
    {
        $result = Db::execute("delete from zwy_data where id = 4");
        dump($result);
    }
    //-----------------数据库原生查询--------------------------------


    //-----------------数据库查询构造器--------------------------------
    /**
     * 数据库查询构造器，可以更方便执行数据库操作，查询构造器基于PDO实现，对不同的数据库驱动都是统一的语法。
     */

    //插入数据
    public function create4()
    {
        $res = Db::table("zwy_data")->insert(["name" => "alickkss", "status" => 2]);
        dump($res);
    }

    //更新记录
    public function update2()
    {
        $res = Db::table("zwy_data")->where("id", 3)->update(["name" => "wilckkkt"]);
        dump($res);
    }

    //查询数据
    //由于我们在模块数据库配置文件中设置了数据表的前缀为zwy_，因此，table方法可以改成name方法
    public function read4()
    {
        //$res = Db::table("zwy_data")->where("id",3)->select();
        $res = Db::name("data")->select();
        dump($res);
    }

    public function delete2()
    {
        $res = Db::table("zwy_data")->where("id", 8)->delete();
        dump($res);
    }

    //链式操作,链式操作不分先后,支持链式操作的查询方法包括：
    //方法名 	描述
    //select 	查询数据集
    //find 	查询单个记录
    //insert 	插入记录
    //update 	更新记录
    //delete 	删除记录
    //value 	查询值
    //column 	查询列
    //chunk 	分块查询
    //count等 	聚合查询
    public function read5(){
        $list = Db::name("data")
            ->where("id=:id or name=:name",["id"=>10,"name"=>"thinkphp"])
            ->field("id,name")
            ->order("id","desc")
            ->limit(10)
            ->select();
        dump($list);
    }

    //支持的聚合查询方法包括：
    //方法 	说明 	参数
    //count 	统计数量 	统计的字段名（可选）
    //max 	获取最大值 	统计的字段名（必须）
    //min 	获取最小值 	统计的字段名（必须）
    //avg 	获取平均值 	统计的字段名（必须）
    //sum 	获取总分 	统计的字段名（必须）

    //-----------------数据库查询构造器--------------------------------


}