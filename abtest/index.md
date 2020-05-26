ab 压力测试

1、 使用步骤

    1、下载 ab 应用程序
    2、添加解压的bin文件夹路径 C:\ab\Apache24\bin 至 Path中
    3、键入命令测试 

> 命令: ab -n100 -c50 http://127.0.0.1:3000/


>常用参数：
 
     -n: 请求个数
     -c：并发量（模拟请求的客户端数量）
     -t: 多少秒内进行并发
 
 * Requests per second:    3031.86 [#/sec] (mean)   
    > 服务器一秒内能接受客户端访问的数量

 * Time per request:       3.298 [ms] (mean)        
    > 处理一个请求所需的时间
 * Time per request:       0.330 [ms] (mean, across all concurrent requests)  
    > 平均多久处理下一个请求
 * Transfer rate:          669.14 [Kbytes/sec] received  
    > 请求在单位时间内从服务器获取的数据长度

[参考文档](https://www.cnblogs.com/chanwahfung/p/11877021.html)