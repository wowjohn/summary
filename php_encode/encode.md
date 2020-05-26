> 代码混淆

* [代码混淆使用开源工具](https://github.com/djunny/enphp)

> 备注：
 
    * new Object(); 需改成 new \path\path\Object();
    * function() :array    类似声明返回值地方需要移除
    * 类似compact('list') 函数调用会存在问题，需改成数组 ['list'=>$list]
    * 类似 方法名为 _list 这种 ,会存在问题
    
    
* 使用  php code_hunxiao_7.php  / php code_hunxiao_56.php 运行即可
* test.php 将备注 1 的问题进行解决
