> 以往我们使用 composer require phpoffice/phpspreadsheet 进行数据表的导入导出,由于内存限制原因,在5万条左右经常会出现内存不足的情况（默认内存为128M）。故推荐使用 viest/php-ext-xlswriter-ide-helper

* 需安装 xlswriter 扩展，推荐使用PECL，方便快速，以下为Dockerfile，供参考
```
FROM registry.cn-hangzhou.aliyuncs.com/jimu/php-symfony:2.1

RUN pecl install xlswriter

RUN echo "extension = xlswriter.so" > /usr/local/etc/php/conf.d/xlswriter.ini
```

也可使用其他方式进行安装，[参考安装文档](https://xlswriter-docs.viest.me/zh-cn/an-zhuang)



* [官方文档](https://xlswriter-docs.viest.me/zh-cn/download) ，以下为导出示例
```text
$config = ['path' => '/home/viest'];
$excel  = new \Vtiful\Kernel\Excel($config);

// fileName 会自动创建一个工作表，你可以自定义该工作表名称，工作表名称为可选参数
$filePath = $excel->fileName('tutorial01.xlsx', 'sheet1')
    ->header(['Item', 'Cost'])
    ->data([
        ['Rent', 1000],
        ['Gas',  100],
        ['Food', 300],
        ['Gym',  50],
    ])
    ->output();


// 如无需导出到浏览器，下列代码无需使用
// Set Header
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="' . $fileName . '"');
header('Content-Length: ' . filesize($filePath));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Cache-Control: max-age=0');
header('Pragma: public');

ob_clean();
flush();

if (copy($filePath, 'php://output') === false) {
    // Throw exception
}

// Delete temporary file
@unlink($filePath);
```

实际运行情况：
    默认内存 128M 情况下
        
    可导出 csv 约 60万行
    可导出 excel 约 20万行