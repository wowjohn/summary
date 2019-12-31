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


-----------------------------------

> 如果需要修改controller,需要修改 GOPATH/src/github.com/george518/PPGo_Job/controllers 下文件，之后进行编译。

> 注： win10  直接切到代码目录， 打开git bash ,CGO_ENABLED=0 GOOS=linux GOARCH=amd64 go build -o PPGo_Job，进行编译即可

---------
[文档地址](https://github.com/george518/PPGo_Job/releases)

------------------------------------
以 2.8.0 版本 为例：

 * 下载源码后修改的地方有：
    > jobs/job.go 修改错误日志未正确输出问题 
```golang
    var b bytes.Buffer
    var c bytes.Buffer
    session.Stdout = &b
    session.Stderr = &c
    //session.Output(command)
    if err := session.Run(command); err != nil { 

/**
* 此处没有 对 jobresult.OutMsg，jobresult.ErrMsg赋值，导致执行任务出错时，无法获取错误信息
*
*  添加即可：
*  jobresult.OutMsg = b.String()
*  jobresult.ErrMsg = c.String()
*/
        jobresult.IsOk = false
        return
    }
    jobresult.OutMsg = b.String()
    jobresult.ErrMsg = c.String()
    jobresult.IsOk = true
    jobresult.IsTimeout = false

```

   > controllers/login.go 修改成登录后直接跳转体验
```golang
    func (self *LoginController) Login() {

    	if self.userId > 0 {
    		self.redirect(beego.URLFor("HomeController.Index"))
    	} else {
    		self.TplName = "login/login.html"
    	}
    }
```
    > 其他为页面部分修改，可以看自己需求