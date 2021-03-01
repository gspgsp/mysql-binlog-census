<?php

/**
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/1
 * Time: 16:34
 */

namespace Parse\Sql\Tests;

use Parse\Sql\Binlog;
use Parse\Sql\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BinlogTest extends TestCase
{
    public function testGetBinlogWithInvalidParam()
    {
        $binlog = new Binlog();

        $this->expectException(InvalidArgumentException::class);

        $binlog->watcher();

        $this->fail('缺少必要参数。。。');
    }
}