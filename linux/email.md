ubuntu 发送邮件

* 1、安装heirloom-mailx
apt-get update && apt-get install -y heirloom-mailx

* 2、配置
vi /etc/nail.rc

```text
set from=429240967@qq.com
set smtp=smtp.qq.com
set smtp-auth-user=429240967@qq.com
set smtp-auth-password=runoob
set smtp-auth=login
```

* 3、在命令行发邮件给QQ邮箱用户
```text
echo "邮件内容" | heirloom-mailx -s "邮件标题" 123@qq.com
```