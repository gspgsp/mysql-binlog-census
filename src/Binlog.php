<?php

/**
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/1
 * Time: 13:08
 */

namespace Parse\Sql;

use MySQLReplication\Config\ConfigBuilder;
use MySQLReplication\MySQLReplicationFactory;
use Parse\Sql\Exceptions\InvalidArgumentException;
use Parse\Sql\Exceptions\InvalidInstanceException;

class Binlog
{
    public $binlogStream;

    public $configBuilder;

    public $config = [];

    public function __construct($config = [])
    {
        // 这里仅仅定义了一种类型的异常
        if (empty($config)) {
            throw new InvalidArgumentException('请输入必要数据库参数');
        }

        if (!isset($config['user'])) {
            throw new InvalidArgumentException('请输入必要数据库参数:user');
        }

        if (!isset($config['host'])) {
            throw new InvalidArgumentException('请输入必要数据库参数:host');
        }

        if (!isset($config['password'])) {
            throw new InvalidArgumentException('请输入必要数据库参数:password');
        }

        $this->configBuilder = (new ConfigBuilder())->withUser($config['user'])
            ->withHost($config['host'])
            ->withPassword($config['password'])
            ->withPort($config['port'] ?? 3306)
            ->withSlaveId($config['slave_id'] ?? 100)
            ->withHeartbeatPeriod($config['heart_beat_period'] ?? 2)
            ->withDatabasesOnly($config['database_name'] ?? [])
            ->build();

        $this->binlogStream = new MySQLReplicationFactory($this->configBuilder);

        $this->config = $config;
    }

    public function watcher()
    {
        if ($this->binlogStream) {
            $this->binlogStream->registerSubscriber(
                $this->subscribeEvent()
            );

            $this->binlogStream->run();
        } else {
            throw new InvalidInstanceException('请先实例化对象');
        }
    }

    public function subscribeEvent()
    {
        return (new EventWatcher())->setConfig($this->config);
    }
}
