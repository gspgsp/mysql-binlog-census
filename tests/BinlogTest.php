<?php

/**
 * 运行方式:
 * $ ./vendor/bin/phpunit --filter testGetBinlogWithInvalidParam
 * ./vendor/bin/phpunit tests
 *
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/1
 * Time: 16:34
 */

namespace Tests;

use Parse\Sql\Binlog;
use Parse\Sql\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class BinlogTest extends TestCase
{
    public function testGetBinlogWithInvalidParam()
    {
        // 断言会出现这个异常，那么当出现这个异常的时候，不会报错；如果没有这个断言，那么出现异常就会报错；当正常运行的时候也不会有任何问题
        $this->expectException(InvalidArgumentException::class);

        $binlog = new Binlog();

        $binlog->watcher();

        // 如果没有抛出异常就会运行到这里，标识当前测试没有成功
        $this->fail('缺少必要参数。。。');
    }
}