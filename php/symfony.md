*  参考 monolog 配置
    * es 配置项需要配上 buffer使用；
    * email 配置项需要 安装 swift_mailer 组件 （sf4.4 默认使用mailer组件，故需安装两个email组件） 

```yaml
monolog:
  handlers:
      main:
          type:         fingers_crossed
          action_level: critical
          handler:      grouped
      grouped:
          type:    group
          members: [streamed, deduplicated]
      streamed:
          type:  stream
          path:  '%kernel.logs_dir%/%kernel.environment%.log'
          level: debug
      deduplicated:
          type:    deduplication
          time:    60
          handler: buffered_swift
      buffered_swift:
          type:    buffer
          handler: swift
      swift:
          type:         swift_mailer
          from_email:   '%env(resolve:FROM_EMAIL)%'
          to_email:     '%env(resolve:TO_EMAIL)%'
          subject:      '[Payment-Api] An Error Occurred! %%message%%'
          level:        debug
          formatter:    monolog.formatter.html
          content_type: text/html
      console:
          type: console
          process_psr_3_messages: false
          channels: ["!event", "!doctrine", "!console"]
      filter_for_errors:
          type: fingers_crossed
          action_level: debug
          channels: ["!event"]
          handler: buffered_es
      buffered_es:
          type:    buffer
          handler: es
      es:
          type: service
          id: Symfony\Bridge\Monolog\Handler\ElasticsearchLogstashHandler
```
