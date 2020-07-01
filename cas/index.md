访问地址  ： https://192.168.40.236:8443/cas/login


phpCAS::client(CAS_VERSION_2_0, 服务器IP地址,端口,目录); 新建连接
phpCAS::setDebug() 开启调试模式
phpCAS::setNoCasServerValidation(); 用http协议连接
phpCAS::handleLogoutRequests(); 同步退出
phpCAS::forceAuthentication(); 调用登录页面
phpCAS::checkAuthentication() 检查是否登录
phpCAS::getUser() 获得登录之后的用户名


备注：
    跨域登录需走https协议，否则cookie无法共享使用
    
    
    
参考文档：https://calnetweb.berkeley.edu/calnet-technologists/cas/how-cas-works