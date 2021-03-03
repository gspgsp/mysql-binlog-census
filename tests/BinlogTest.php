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
    /**
     * @Notes: 测试当前实例有没有按规参数传参
     * @Author: guoshipeng
     * @Time: Times
     * @Interface testGetBinlogWithInvalidParam
     */
    public function testGetBinlogWithInvalidParam()
    {
        // 断言会出现这个异常，那么当出现这个异常的时候，不会报错；如果没有这个断言，那么出现异常就会报错；当正常运行的时候也不会有任何问题
        $this->expectException(InvalidArgumentException::class);

        $binlog = new Binlog();

        $binlog->watcher();

        // 如果没有抛出异常就会运行到这里，标识当前测试没有成功
        $this->fail('缺少必要参数。。。');
    }

    /**
     * @Notes: 测试当前实例所属类
     * @Author: guoshipeng
     * @Time: Times
     * @Interface testGetInstance
     */
    public function testGetInstance()
    {
        // 如果没有这个异常断言，那么执行到下面行，由于没有传参数，会抛出异常；如果有这个异常断言，就不会抛出异常
        $this->expectException(InvalidArgumentException::class);

        $binlog = new Binlog();

        // 断言当前实例为指定类型
        $this->assertInstanceOf(Binlog::class, $binlog);
    }
}