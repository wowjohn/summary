# 开源堡垒机搭建总结

[官方文档](http://docs.jumpserver.org/zh/docs/)

> 本文档使用的是1.4.6版本

* 如果只是在本地搭建测试用，[docker 一键安装文档]http://docs.jumpserver.org/zh/docs/dockerinstall.html
    * 注 ：账户、密码默认都为admin


* 云服务器搭建后个人认识
    * 该项目共有五部分组成（nginx代理、jumpserver、coco、guacamole,luna），需确保版本号一致
    * jumpserver 使用到了 mysql 和 redis
    * 使用多个镜像连接搭建，保证扩展性
    * coco 作用是 ssh连接
    * guacamole 作用是 RDP 连接
    * luna 只是静态页面，保证Web Terminal 访问
    * 先运行 jumpserver 再运行coco,guacamole 注册 , 注册后需多次刷新terminal
   
> * coco,guacamole 在 jumpserver上注册时 需保证 BOOTSTRAP_TOKEN 一致，用来注册服务账号，保证验证通过

> * 需要修改jumpserver的config.py 文件 ，也可直接再docker-compose 设置变量值

> * coco 需要修改conf.py 文件 ，也可直接再docker-compose 设置变量值

> * nginx的配置直接参考nginx文件夹下文件即可

> * jumpserver镜像参考jumpserver文件夹下Dockerfile构建

```
    建议直接参考云服务器部署方式在本地部署
```
