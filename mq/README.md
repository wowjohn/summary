### MQ消息队列

* windows下安装amqp(MQ的php扩展)
    * [下载扩展包](https://pecl.php.net/package/amqp)
    * 选择对应版本包下载  (https://windows.php.net/downloads/pecl/releases/amqp/1.9.4/php_amqp-1.9.4-7.2-ts-vc15-x64.zip)
    * 将 php_amqp.dll 放入 php的ext文件中
    * 将 rabbitmq.4.dll 放入到php.ini同级目录中
    * 修改 php.ini,添加  extension=php_amqp
    
 [Dokcer 运行](rabbitmq/README.md)