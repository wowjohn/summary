redis 设置密码登录

使用docker-compose 运行

配置项参照下面格式，可不写用户名，默认没有用户名，使用aliyun的话，添加对应用户名，密码，访问地址即可


```text
# redis://[user:pass@][ip|host|socket[:port]][/db-index]
# passwords that contain special characters (@, %, :, +) must be urlencoded
REDIS_URL=redis://127.0.0.1
REDIS_URL=redis://:Y123321@192.168.40.236/10
```

----------------------------------

* 分布式锁(因为redis使用的是单进程单线程模型)

setnx 如果不存在key,进行赋值，如果存在，不进行赋值

同时需加上过期时间，使用expire 进行操作，expire 的过期时间需要大于业务执行的时间
但是存在特殊情况，业务时间往往无法预测，这时需在对应机器上增加一个守护进程，
比如说每5秒执行一次守护进程，守护进程的逻辑是（
  if（a = ttl key  > 0）{
      expire (a + 5s);
  }
）
通过这种方式解决该问题