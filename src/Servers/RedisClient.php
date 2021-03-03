<?php

/**
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/3
 * Time: 16:07
 */

namespace Parse\Sql\Servers;

use Predis\Client;

class RedisClient
{
    const USER_QUOTE = 'user:quote:count';
    protected $redis;
    protected $redis_conf;

    public function __construct($config)
    {
        $this->redis_conf = $config['redis_conf'];

        $this->redis = new Client($this->redis_conf);
        //$this->redis->select(10);
    }

    /**
     * @Notes: 用户报价次数
     * @Author: guoshipeng
     * @Time: Times
     * @Interface incQuote
     * @return int
     */
    public function incQuote()
    {
        return $this->redis->incr(self::USER_QUOTE);
    }
}