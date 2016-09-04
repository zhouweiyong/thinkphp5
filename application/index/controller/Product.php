<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

/**
 * 主要学习
 * 1,带参数请求和参数接收
 * 2,响应客户端
 */
class Product extends Controller{

    //数据库查询
    public function show(){
        $data = Db::name("data")->find();
        $this->assign("result",$data);
        return $this->fetch();
    }

    public function say(Request $request){

        //请求的参数信息
        echo '请求方法：' . $request->method() . '<br/>';
        echo '资源类型：' . $request->type() . '<br/>';
        echo '访问IP：' . $request->ip() . '<br/>';
        echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
        echo '请求参数：';
        dump($request->param());
        echo '请求参数：仅包含name';
        dump($request->only(['name']));
        echo '请求参数：排除name';
        dump($request->except(['name']));

        //--------请求的URL信息----------------

        // 获取当前域名
        echo 'domain: ' . $request->domain() . '<br/>';
        // 获取当前入口文件
        echo 'file: ' . $request->baseFile() . '<br/>';
        // 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
        // 获取包含域名的完整URL地址
        echo 'url with domain: ' . $request->url(true) . '<br/>';
        // 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . $request->baseUrl() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root:' . $request->root() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root with domain: ' . $request->root(true) . '<br/>';
        // 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
        // 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . $request->path() . '<br/>';
        // 获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';


        //转换输出地址
        ///index.php/index/product/prolist.html
        $urll = url("Product/prolist");
        echo $urll;
    }

    //--------------------接收参数-----------------------------------

    //http://localhost:8888/index.php/index/product/prolist?name=tome&&age=32&&color=blue
    public function prolist(Request $request){
        echo "url>>>>".$request->url();
        dump($request->param());
        echo "name>>>>".$request->param("name");
    }

    //http://localhost:8888/index.php/index/product/edit?name=tome&&age=32&&color=blue
    public function edit(){
        echo "url>>>>".$this->request->url();
        dump($this->request->param());
        echo "edit>>>name>>>>".$this->request->param("name");
    }

    //http://localhost:8888/index.php/index/product/edit2?name=tome&&age=32&&color=blue
    public function edit2(){
        echo "url>>>>".request()->url();
        dump(request()->param());
        echo "edit2>>>>name>>>>".request()->param("name");
        echo "<br/>get>>>>name>>>>".request()->get("name");
    }

    //http://localhost:8888/index.php/index/product/edit3?name=tome&&age=32&&color=blue
    public function edit3(){
        echo "url>>>>".request()->url();
        dump(input());
        echo "edit2>>>>name>>>>".input("name");
        echo "<br/>get>>>>name>>>>".input("get.name");
        //支持默认值和过滤方法
        //strtoupper: 接收到的参数转换成大写
        //strtolower:接收到的参数转换成小写
        echo "<br/>edit2>>>>name>>>>".input("test","default value","strtoupper");
    }

    //--------------------接收参数-----------------------------------


    //---------------------响应------------------------------------------

    //给客户端返回HTML代码,可以通过$this->fetch()抓取模版的代码返回
    public function showto(){
        return "<div style=\"width: 100px;height: 100px;background-color: red;\">hello</div>";
    }

    /**
     * 支持输出类型:
     * 1,模版输出
     * 2,JSON输出  json()
     * 3,JSONP输出  jsonp();
     * 4,XML输出  xml()
     * 5,页面重定向 redirect();
     */
    public function showto2(){
        $data = ['name' => 'thinkphp', 'status' => '1'];
        return json($data);
    }

    //页面重定向
    //localhost:8888/index/product/showto3?name=thinkphp
    public function showto3($name='')
    {
        if ('thinkphp' == $name) {
            //$this->success('欢迎使用ThinkPHP5.0','hello');
//            $this->redirect('http://thinkphp.cn');
//            $this->redirect('hello');
            redirect('http://thinkphp.cn');
        } else {
            $this->error('错误的name','guest');
        }
    }

    public function hello()
    {
        return 'Hello,ThinkPHP!';
    }

    public function guest()
    {
        return 'Hello,Guest!';
    }




    //---------------------响应------------------------------------------

}