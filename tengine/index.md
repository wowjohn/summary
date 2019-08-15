* docker-compose.yml
```bash
  tengine:
    image: axizdkr/tengine:alpine
    container_name: tengine
    volumes:
      - 'c:/work/:/var/www/'
      - './log/nginx_log:/var/log/nginx/'
      - ./nginx/conf.d:/etc/nginx/conf.d
      - ./nginx/nginx.conf:/etc/nginx/nginx.conf
      - ./nginx/fastcgi_params:/etc/nginx/fastcgi_params
    ports:
      - "80:80"
      - "443:443"
```

* server 优化项

```text
# server 头 伪装
server_tag Apache/2.4.41;
# server 头 隐藏
# server_tag off;

#错误信息提示
server_info on;
server_admin ss@ssss.com;
```
