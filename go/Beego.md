> go build时出现 undefined: beego.Error() 时使用下面命令解决    
 ```bash
go get -u github.com/astaxie/beego
```

* go get 太慢：
> 通过 [ip查找工具](https://www.ipaddress.com/ip-lookup) ,查询出 github.com 对应 ip,修改文件 /etc/hosts，加上ip 


> 输出对应文件名： go build -o （build后的文件名） 