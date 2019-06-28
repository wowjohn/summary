### xxl-job 定时任务管理系统

* [参考文档](http://www.xuxueli.com/xxl-job/#/)

* Docker 部署 文件

```bash

version: '3.4'
services:
  xxl-job-admin:
    image: xuxueli/xxl-job-admin:2.0.2
    container_name: xxl-job-admin
    environment:
      - spring.datasource.url=jdbc:mysql://192.168.40.236:3306/xxl_job?Unicode=true&characterEncoding=UTF-8
      - spring.datasource.username=root
      - spring.datasource.password=123456
      - spring.mail.username=1055@qq.com
      - spring.mail.password=ybbcdtdsdajebcg
    ports:
      - 8080:8080
    volumes:
      - ./tmp:/data/applogs
```

* 备注： mysql 基础建表语句 [下载地址](https://github.com/xuxueli/xxl-job/releases) ,解压后 ，找到 doc\db\tables_xxl_job.sql ,执行即可

* 本地访问：http://192.168.40.236:8080/xxl-job-admin/