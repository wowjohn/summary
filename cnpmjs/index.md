### 说明 
 * 默认url: http://x.x.x.x:7002/
 * 默认registry地址： http://x.x.x.x:7001
 
 
> 操作命令参考：
 
 ```text
cnpm config set registry http://x.x.x.x:7001
 
cnpm login 
	username: aaa
	pwd: 123456
	email: 12@qq.com
	
cnpm publish (名称只可使用 @cnpm, @cnpmtest, @cnpm-test ，例如name:@cnpm/helloworld)
 
cnpm install @cnpm/helloworld
```

[安装使用说明文档](https://github.com/cnpm/cnpmjs.org) 

> 配置修改： cnpmjs\docs\dockerize\config.js