<?php
//index模块数据库配置


return [
    // 数据库表前缀
    'prefix'      => 'zwy_',
    // 数据库连接参数
    'params' => [
        // 使用长连接
        \PDO::ATTR_PERSISTENT => true,
    ],
];
