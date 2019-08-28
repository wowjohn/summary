解决步骤
```text
fenzhi 合并 至dev

dev 分支拉取最新代码

git fetch origin 

git fetch origin fenzhi:fenzhi

git merge --no-ff fenzhi

解决冲突

git merge --continue

git push origin dev
```

ok !!!