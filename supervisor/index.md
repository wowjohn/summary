操作命令
    
* supervisorctl status
    > 查看所有被管理项目运行状态
* supervisorctl update
    > 重新加载配置文件
* supervisorctl reload
    > 重新启动所有程序

举例
```text
[program:email-receive]
# 设置命令在指定的目录内执行
directory=/home/httpd/api/
# 这里为您要管理的项目的启动命令
command=/usr/local/bin/php bin/console cron:receive
# 以哪个用户来运行该进程
user=webid
# supervisor 启动时自动该应用
autostart=true
# 进程退出后自动重启进程
autorestart=true
# 进程持续运行多久才认为是启动成功
startsecs=1
# 重试次数
startretries=3
# stderr 日志输出位置
stderr_logfile=/home/httpd/api/var/log/stderr.log
# stdout 日志输出位置
stdout_logfile=/home/httpd/api/var/log/stdout.log
```