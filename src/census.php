<?php
/**
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/5
 * Time: 16:20
 */

return [
    'user' => 'mysql数据库用户名',
    'host' => 'msyql主机名',
    'password' => 'mysql数据库用户密码',
    'port' => '3306',
    'slave_id' => '100',
    'heart_beat_period' => '2',
    'database_name' => [],
    'extra' => [
        'action' => '操作',
        'redis_conf' => [
            'host' => 'redis数据库主机名',
            'password' => 'redis数据库主机密码',
            'port' => '6379',
            'database' => '0',
        ]
    ]
];