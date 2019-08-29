### gitbook

* 常用命令行
    * npm install -g gitbook-cli 全局安装 gitbook-cli
    * gitbook init 初始化
    * gitbook serve 运行
    * gitbook build 编译打包
    
    
    从 0 出发 步骤：
    
    1. 本地安装node
    2. 运行 npm install -g gitbook-cli
    3. 初始化 gitbook init
    4. gitbook serve 本地运行
    
    备注：若需要编译放至公网访问 需运行 gitbook build 将新生成的 _book 文件夹放至 nginx 目录下访问即可
    
 > 本目录 直接 clone 到本地 ，在确保 node 和 gitbook-cli 的安装的前提下 ，直接运行  gitbook serve 访问即可