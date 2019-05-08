### mysql 命令行导出数据

1、进入系统(非进入mysql)
 
2、运行 mysqldump -uecmall -p2gtkdW4VNbN6IUu5 ecmall > ecmall.sql

> mysqldump -u(用户名) -p(密码) (数据库名称) > 导出sql的名称



### aliyun 迁移数据库步骤

    1、购买RDS实例
    
    2、设置白名单，将对应ECS的私有地址（ip）加入白名单（重要）
    
    3、创建数据库连接账号
    
    4、迁移数据库 （2200万行数据的迁移时间在30~60分钟左右）
    
    5、web项目修改conf文件（使用数据库内网地址），执行缓存预热