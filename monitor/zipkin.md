 ### 链路监控(zipkin)
 
[zipkin官方文档](https://zipkin.io/)
 
 * docker 安装
 ```bash
    docker run -d -p 9411:9411 --name zipkin openzipkin/zipkin
```

 #### 以php为例
  
  * 使用步骤
  
1、 引入
     
 ```bash
   composer require openzipkin/zipkin
```

   2、代码示例

```php

    $endpoint = Endpoint::createFromGlobals();
    
    // Logger to stdout
    $logger = new \Monolog\Logger('log');
    $logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

    $reporter = new Http();
    $sampler  = BinarySampler::createAsAlwaysSample();
    $tracing  = TracingBuilder::create()
        ->havingLocalEndpoint($endpoint)
        ->havingSampler($sampler)
        ->havingReporter($reporter)
        ->build();

    $tracer = $tracing->getTracer();
    
    $span = $tracer->newTrace();
    $span->setName("test");
    $span->start();
    try {
        echo 345345;
    } finally {
        $span->finish();
    }

    $tracer->flush();
```

```php
        //$endpoint = Endpoint::createFromGlobals();
        $endpoint = Endpoint::create("php-test");

        //如果zipkin部署在其他机器，则键入对应endpoint_url地址，如果在本机，则不用设置此参数
        $reporter = new Http(null, ['endpoint_url' => 'http://192.168.200.191:9412/api/v2/spans']);
        $sampler  = BinarySampler::createAsAlwaysSample();
        $tracing  = TracingBuilder::create()
            ->havingLocalEndpoint($endpoint)
            ->havingSampler($sampler)
            ->havingReporter($reporter)
            ->build();

        $tracer = $tracing->getTracer();

        $span = $tracer->newTrace();
        $span->setName("encode");
        $span->tag('http.status_code', 509);
        $span->tag('http.fsdfsdfsd', 611);
        $span->start();
        try {
            $parentContext = $span->getContext();
            $childSpan     = $tracer->newChild($parentContext);
            $childSpan->setName("encode1");
            $childSpan->start();
            usleep(100000);
            $childSpan->finish();

            $childSpan2 = $tracer->newChild($parentContext);
            $childSpan2->setName("encode2");
            $childSpan2->start();
            usleep(100000);
            $childSpan2->finish();

        } finally {
            $span->finish();
        }

        $tracer->flush();
```

```php
    $endpoint = Endpoint::create("php-testb");
    
    $reporter = new Http();
    $sampler  = BinarySampler::createAsAlwaysSample();
    $tracing  = TracingBuilder::create()
        ->havingLocalEndpoint($endpoint)
        ->havingSampler($sampler)
        ->havingReporter($reporter)
        ->build();

    $tracer = $tracing->getTracer();

    $span = $tracer->newTrace();
    $span->setName('get-testb');
    $span->setKind(\Zipkin\Kind\CLIENT);
    $span->tag('http.status_code', '200');
    $span->tag(HTTP_PATH, '/test/testb.json');
    $span->setRemoteEndpoint(Endpoint::create('backend', '192.168.40.203', null, 80));

// when the request is scheduled, start the span
    $span->start();

// if you have callbacks for when data is on the wire, note those events
//        $span->annotate(WIRE_SEND, '');
//        $span->annotate(WIRE_RECV, '');

// when the response is complete, finish the span
    $span->finish();

    $tracer->flush();
```

* 访问localhost://9411 查看效果即可