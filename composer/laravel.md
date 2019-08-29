### composer配置 phpcomposer 下载镜像时超时问题

#### 从 phpcomposer 的 Composer 镜像迁移到 Laravel China 维护的镜像

1、配置 laravel-china 镜像
``` bash
composer config -g repo.packagist composer https://packagist.laravel-china.org
```

2、 刷新 composer.lock 文件
```bash
composer update nothing
```
或
```bash
composer update --lock
```
> --lock: 只升级 lock 文件的哈希以消除 lock 文件过期的警告。


* 清空本地缓存  composer clear-cache


* [参考文档][1]

[1]: https://learnku.com/laravel/wikis/16722