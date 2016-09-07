<?php

namespace app\index\validate;


use think\Validate;

/**
 * 验证
 * 比如:表单提交时候的验证
 */
class Student extends Validate
{
    protected $rule = [
        "studentName" => "require|length:3,16",
        "studentAge" => "require|number|>:16",
    ];

    protected $message = [
        "studentName.require" => "学生姓名不能为空",
        "studentName.length" => "学生姓名长度一定要在3到16之间",
        "studentAge.require" => "学生年龄也是必须的",
        "studentAge.gt" => "学生必须大于16岁"
    ];
}