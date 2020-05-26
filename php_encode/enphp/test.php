<?php

error_reporting(E_ERROR);

ob_implicit_flush(1);

include './func_v2.php';

$originDir = __DIR__ . '/code_origin/';

$files = new FilesystemIterator($originDir);

foreach ($files as $file) {
    //过滤非php文件
    if ($file->getExtension() != 'php') {
        continue;
    }

    //获取文件内容
    $content = file_get_contents($file->getRealPath());

    //查出命名空间组
    preg_match_all('/use( \S+;)/U', $content, $namespaceMatchs);
    $namespaceArray = $namespaceMatchs[1];

    //查出需添加的变量组
    preg_match_all('/new (\S+)\(/U', $content, $needAddNamespaceMatchs);
    $needAddNamespaceArray = $needAddNamespaceMatchs[1];

    //循环比对，将对应对象的命名空间补充完整
    foreach ($namespaceArray as $namespace) {
        foreach ($needAddNamespaceArray as $needAddNamespace) {
            if (strpos($namespace, $needAddNamespace)) {
                //写入备份文件
//                touch($file->getRealPath() . '.bak');
//                file_put_contents($content, $file->getRealPath() . '.bak');

                //更新旧文件
                $namespace = trim(rtrim($namespace, ';'));
                $content   = str_replace("new $needAddNamespace", "new \\$namespace", $content);
                file_put_contents($file->getRealPath(), $content);
            }
        }
    }

    $encodeOptions = [
        //混淆方法名 1=字母混淆 2=乱码混淆
        'ob_function'        => 0,
        //混淆函数产生变量最大长度
        'ob_function_length' => 3,
        //混淆函数调用 1=混淆 0=不混淆 或者 array('eval', 'strpos') 为混淆指定方法
        'ob_call'            => 0,
        //随机插入乱码
        'insert_mess'        => 0,
        //混淆函数调用变量产生模式  1=字母混淆 2=乱码混淆
        'encode_call'        => 0,
        //混淆class
        'ob_class'           => 0,
        //混淆变量 方法参数  1=字母混淆 2=乱码混淆
        'encode_var'         => 2,
        //混淆变量最大长度
        'encode_var_length'  => 5,
        //混淆字符串常量  1=字母混淆 2=乱码混淆
        'encode_str'         => 2,
        //混淆字符串常量变量最大长度
        'encode_str_length'  => 3,
        // 混淆html 1=混淆 0=不混淆
        'encode_html'        => 0,
        // 混淆数字 1=混淆为0x00a 0=不混淆
        'encode_number'      => 0,
        // 混淆的字符串 以 gzencode 形式压缩 1=压缩 0=不压缩
        'encode_gz'          => 1,
        // 加换行（增加可阅读性）
        'new_line'           => 1,
        // 移除注释 1=移除 0=保留
        'remove_comment'     => 0,
        // debug
        'debug'              => 1,
        // 重复加密次数，加密次数越多反编译可能性越小，但性能会成倍降低
        'deep'               => 1,
        // PHP 版本
        'php'                => 5,
    ];

    log::info('encoded', $file->getRealPath());
    // encode target
    enphp_file($file->getRealPath(), $file->getRealPath(), $encodeOptions);

    $old_output = $output = [];

    $output     = implode("\n", $output);
    $old_output = implode("\n", $old_output);
    $old_output = strtr($old_output, [realpath($file) => realpath($file->getRealPath())]);

    // compare result
    if ($old_output == $output) {
        log::info('SUCCESS_TEST');
    } else {
        log::info('FAILURE_TEST');
        echo str_repeat('===', 5);
        echo "\r\nold=", trim($old_output), "\r\n";
        echo str_repeat('===', 5);
        echo "\r\nnew=", trim($output), "\r\n";
        break;
    }
}

echo 'success';