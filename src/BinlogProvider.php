<?php
/**
 * Created by PhpStorm.
 * User: gsp
 * Date: 2021/3/5
 * Time: 16:17
 */

namespace Parse\Sql\BinlogProvider;

use Illuminate\Support\ServiceProvider;

class BinlogProvider extends ServiceProvider
{
    /**
     * 引导应用程序服务
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!file_exists(config_path('census.php'))) {
            $this->publishes([
                __DIR__. '/census.php' => config_path('census.php'),
            ], 'config');
        }
    }

    /**
     * 注册应用程序服务
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Config path.
        $config_path = __DIR__.'/census.php';

        // 发布配置文件到项目的 config 目录中.
        $this->mergeConfigFrom(
            $config_path,
            'census'
        );
    }
}

