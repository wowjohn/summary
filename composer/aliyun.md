### 阿里云 Composer 全量镜像

>全局配置
```bash
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```
>>取消配置：
```bash
composer config -g --unset repos.packagist
```

-----

> 指定项目配置
```bash
composer config repo.packagist composer https://mirrors.aliyun.com/composer/
```
>> 取消配置：
```bash
composer config --unset repos.packagist
```

* [参考文档][1]

[1]: https://developer.aliyun.com/composer