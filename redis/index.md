redis 设置密码登录

使用docker-compose 运行

配置项参照下面格式，可不写用户名，默认没有用户名，使用aliyun的话，添加对应用户名，密码，访问地址即可


```text
# redis://[user:pass@][ip|host|socket[:port]][/db-index]
# passwords that contain special characters (@, %, :, +) must be urlencoded
REDIS_URL=redis://127.0.0.1
REDIS_URL=redis://:Y123321@192.168.40.236/10
```
