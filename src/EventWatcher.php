<?php

/**
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/3
 * Time: 14:38
 */

namespace Parse\Sql;

use MySQLReplication\Event\DTO\WriteRowsDTO;
use MySQLReplication\Event\EventSubscribers;
use Parse\Sql\Servers\RedisClient;

class EventWatcher extends EventSubscribers
{
    // 客户端的配置
    public $config = [];

    public function setConfig($config = [])
    {
        $this->config = $config;
        return $this;
    }

    public function getConfig()
    {
        $this->config;
    }

    public function onWrite(WriteRowsDTO $event): void
    {
        $res = json_decode(json_encode($event), true);
        if ($res['type'] == 'update' || $res['type'] == 'write' || $res['type'] == 'delete') {
            if (isset($this->config['extra']) && isset($this->config['extra']['action'])) {
                call_user_func([$this, $this->config['extra']['action']], $res);
            }
        }
    }

    public function toRedis($data)
    {
        //报价表
        if($data['tableMap']['table'] == 'q_quotes'){
            if (isset($this->config['extra']) && isset($this->config['extra']['user_id'])) {
                (new RedisClient($this->config['extra']))->incQuote();
            }
        }
    }

    public function toKafka($data)
    {
        //TODO
    }

    public function toRabitMq($data)
    {
        //TODO
    }

    public function toEs($data)
    {
        //TODO
    }


}