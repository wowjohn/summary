symfony API token

> 示例
```text
security:
    providers:
      adminUsers:
        entity:
          class: 'App\Entity\User'
          property: 'username'

    firewalls:
      dev:
        pattern: ^/(_(profiler|wdt)|css|images|js)/
        security: false
      main:
        pattern: ^/(api)/
        anonymous: lazy
#        stateless: true  //如果开启，则无需使用provider
        logout: ~
        user_checker: App\Security\UserChecker
        guard:
          authenticators:
            - App\Security\TokenAuthenticator
```


1、使用 Guard

> 在security.yaml添加对应的配置
```text
guard:
  authenticators:
    - App\Security\TokenAuthenticator

class UserRepository extends ServiceEntityRepository implements UserLoaderInterface
```

> 在UserRepository 实现 loadUserByUsername方法


TokenAuthenticator 中方法

* supports  判断token 是否进行传递，未传递需报出异常
* getCredentials 获取token
* checkCredentials 在 Guard API token 方式下无需配置
* getUser 获取用户对象
* onAuthenticationFailure 当用户对象为 null时进行执行

2、配置 UserProvider
```text
providers:
  adminUsers:
    entity:
      class: 'App\Entity\User'
      property: 'username'

class User implements UserInterface
```
在 User 中 实现 getRoles ，eraseCredentials 方法，当权限未使用时，直接返回空数组即可

3、配置 UserChecker
```text
user_checker: App\Security\UserChecker
```
对 user 进行验证 ,例如是否锁定

4、配置路由匹配正则
```text
pattern: ^/(api)/
```

注：如果 设置stateless: true，则无需使用 provider

> JWT接入使用流程 (JWT 只是一款token生成解析工具)

 * 生成： Login 登录时进行创建token
 * 解析： 在 TokenAuthenticator 的 getCredentials 方法下进行解析token
  
 