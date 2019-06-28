composer require friendsofphp/php-cs-fixer --dev

项目根目录 会生成 .php_cs.dist 文件 ，复制出来重命名 .php_cs

初始 .php_cs 文件
```php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('var')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;
```

windows 运行命令
```bash
vendor\bin\php-cs-fixer.bat fix
```

Example
```bash
vendor\bin\php-cs-fixer.bat fix tests/Controller/EmailControllerTest.php --diff

vendor\bin\php-cs-fixer.bat fix tests/Controller/EmailControllerTest.php --rules=@Symfony
```

[参考文档](https://cs.symfony.com/)