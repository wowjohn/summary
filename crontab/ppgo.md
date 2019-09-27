ubuntu 安装 go
1、[下载](https://golang.google.cn/dl/) go  例如： wget https://dl.google.com/go/go1.13.1.linux-amd64.tar.gz  
2、tar -C /usr/local -xzf  go1.13.1.linux-amd64.tar.gz  
3、export PATH=$PATH:/usr/local/go/bin


* go build 时，遇到以下错误  
```text
package golang.org/x/crypto/ssh: unrecognized import path "golang.org/x/crypto/ssh" (https fetch: Get https://golang.org/x/crypto/ssh?go-get=1: dial tcp 216.239.37.1:443: getsockopt: connection refused)
```
解决： git clone https://github.com/golang/crypto.git 并拷贝到 $GOPATH/src/golang.org/x/ 下就OK



* go get 遇到  package math/bits: unrecognized import path "math/bits" (import path does not begin with hostname)

解决：升级 go > 1.10

* go get 遇到 
```text
# runtime
/usr/local/go/src/runtime/map.go:65:2: bucketCntBits redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:64:18
/usr/local/go/src/runtime/map.go:66:2: bucketCnt redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:65:23
/usr/local/go/src/runtime/map.go:77:2: maxKeySize redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:74:17
/usr/local/go/src/runtime/map.go:83:2: dataOffset redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:83:4
/usr/local/go/src/runtime/map.go:94:2: evacuatedX redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:91:19
/usr/local/go/src/runtime/map.go:95:2: evacuatedY redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:92:19
/usr/local/go/src/runtime/map.go:96:2: evacuatedEmpty redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:90:19
/usr/local/go/src/runtime/map.go:97:2: minTopHash redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:93:19
/usr/local/go/src/runtime/map.go:100:2: iterator redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:96:17
/usr/local/go/src/runtime/map.go:101:2: oldIterator redeclared in this block
        previous declaration at /usr/local/go/src/runtime/hashmap.go:97:17
/usr/local/go/src/runtime/map.go:101:2: too many errors
```

> 解决办法：卸载 go (直接删除 /usr/local/go 文件夹) , 直接重新安装 go


------------

如果需要修改controller,需要修改 GOPATH/src/github.com/george518/PPGo_Job/controllers 下文件，之后进行编译。

镜像：
 GOPATH: /root/go/src
 
* > 切换到目录： /usr/local/PPGo_Job-2.8.0  ，docker-compose 运行时编译，CGO_ENABLED=0 GOOS=linux GOARCH=amd64 go build -o PPGo_Job  (需要在linux 环境下运行该命令)

* > 修改页面数据，直接修改对应html,重新build 镜像

* > 可运行：docker run -it registry.cn-hangzhou.aliyuncs.com/jimu/go:build-ppgo bash，在该环境下进行编译


---------
[文档地址](https://github.com/george518/PPGo_Job/releases)
