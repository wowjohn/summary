## linux 常用命令备忘

* 查找大于100M的文件
```bash
    find . -type f -size +100M
```

* 删除状态为Exited的容器
```bash
    docker rm `docker ps -a|grep Exited|awk '{print $1}'`
```
