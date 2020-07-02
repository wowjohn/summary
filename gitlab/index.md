> 删除gitlab 工具  docker volumn 下的系统文件
```text

#!/bin/bash
for i in $(docker ps -a|grep -v CONTAINER|awk '{print $1}')
do 
docker inspect $i |grep '/var/lib/docker/volumes'|awk -F '["/ :]+' '{print $7}' >> /home/tmp.txt
done

for j in $(cat /home/tmp.txt)
do
cp -rf /alidata/docker-volumes/$j /alidata/docker-volumes1/
done

rm -rf tmp.txt

```

gitlab 备份文件  docker exec gitlab gitlab-rake gitlab:backup:create
备份文件位置 /gitlab/data/backups