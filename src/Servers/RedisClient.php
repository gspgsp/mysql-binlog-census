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
    const USER_QUOTE = 'user:%s:quote';
    protected $redis;
    protected $redis_conf;
    protected $user_id;

    public function __construct($config)
    {
        $this->user_id = $config['user_id'];
        $this->redis_conf = $config['redis_conf'];

        $this->redis = new Client($this->redis_conf);
        $this->redis->select(10);
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
        $key = sprintf(self::USER_QUOTE, $this->user_id);

        return $this->redis->incr($key);
    }
}