<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Workerman\Worker;
use GatewayWorker\Register;
use GatewayWorker\Gateway;
use GatewayWorker\BusinessWorker;

class im extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'im {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a Workerman server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
		global $argv;
        $arg = $this->argument('action');
        $argv[1] = $argv[2];
        $argv[2] = isset($argv[3]) ? "-{$argv[3]}" : '';
        switch ($arg) {
            case 'start':
                $this->start();
                break;
            case 'stop':
                break;
            case 'restart':
                break;
            case 'reload':
                break;
            case 'status':
                break;
            case 'connections':
                break;
        }
    }
	private function start()
    {
        // register 必须是text协议
//        $register = new Register('text://0.0.0.0:1238');

// gateway 进程，这里使用Text协议，可以用telnet测试
        $gateway = new Gateway("tcp://0.0.0.0:8282");
// gateway名称，status方便查看
        $gateway->name = 'YourAppGateway';
// gateway进程数
        $gateway->count = 4;
// 本机ip，分布式部署时使用内网ip
        $gateway->lanIp = '127.0.0.1';
// 内部通讯起始端口，假如$gateway->count=4，起始端口为4000
// 则一般会使用4000 4001 4002 4003 4个端口作为内部通讯端口
        $gateway->startPort = 2900;
// 服务注册地址
        $gateway->registerAddress = '127.0.0.1:1238';

// 心跳间隔
$gateway->pingInterval = 10;
// 心跳数据
$gateway->pingData = '{"type":"ping"}';

        /*
        // 当客户端连接上来时，设置连接的onWebSocketConnect，即在websocket握手时的回调
        $gateway->onConnect = function($connection)
        {
            $connection->onWebSocketConnect = function($connection , $http_header)
            {
                // 可以在这里判断连接来源是否合法，不合法就关掉连接
                // $_SERVER['HTTP_ORIGIN']标识来自哪个站点的页面发起的websocket链接
                if($_SERVER['HTTP_ORIGIN'] != 'http://kedou.workerman.net')
                {
                    $connection->close();
                }
                // onWebSocketConnect 里面$_GET $_SERVER是可用的
                // var_dump($_GET, $_SERVER);
            };
        };
        */

// bussinessWorker 进程
        $worker = new BusinessWorker();
// worker名称
        $worker->name = 'YourAppBusinessWorker';
// bussinessWorker进程数量
        $worker->count = 4;
// 服务注册地址
        $worker->registerAddress = '127.0.0.1:1238';

// 如果不是在根目录启动，则运行runAll方法
        Worker::runAll();
    }
}
