<h1 align="center">census</h1>
<p align="center">一个用来解析binlog的到sql的包，主要是之前准备用binlog做恢复的操作，但是后来没有找到合适的插件，有考虑过有考虑过用ali的canal，这个功能介绍的很全，但是使用起来会有些问题，服务端可以跑起来，但是
                  做数据同步的时候一直有问题，php的客户端没什么问题。可以正常获取到数据。后来找到 krowinski/php-mysql-replication 包，准备加点数据处理的功能在里面。</p>

[![Build Status](https://travis-ci.com/gspgsp/mysql-binlog-census.svg?branch=master)](https://travis-ci.com/github/gspgsp/mysql-binlog-census)

## 安装

```shell
$ composer require census/sql -vvv
```
## 运行环境要求
```
- PHP 7.3+
- Mysql 5.7+
```
## 使用

TODO

## 建议


## License

MIT