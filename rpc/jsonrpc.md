示例服务端使用hyperf框架：

app/JsonRpc/AdditionService
```text
/**
 * @RpcService(name="AdditionService", protocol="jsonrpc-http", server="jsonrpc-http")
 */
class AdditionService
{
    public function add(int $a, int $b): int
    {
        return $a + $b + 4;
    }

    public function test(string $name): string
    {
        return "Hello {$name}";
    }
}
```

config/autoload/server.php
```text 
        [
            'name' => 'jsonrpc-http',
            'type' => Server::SERVER_HTTP,
            'host' => '0.0.0.0',
            'port' => 9504,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                SwooleEvent::ON_REQUEST => [\Hyperf\JsonRpc\HttpServer::class, 'onRequest'],
            ],
        ],
```


客户端使用(传统php框架)：

composer require graze/guzzle-jsonrpc

```text
// Create the client
        $client = Client::factory('192.168.40.236:29504');

//        $res = $client->send($client->request(34234, '/addition/add', ['a' => 1, 'b' => 5]));

        $res = $client->send($client->request(34234, '/addition/test', ['name' => 'World']));

        dump($res->getBody()->getContents());
```