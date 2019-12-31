npm init  生成package.json

npm install --save-dev @commitlint/cli
npm install --save-dev @commitlint/config-conventional

echo "module.exports = {extends: ['@commitlint/config-conventional']};" > commitlint.config.js   (也可根目录下创建commitlint.config.js 输入 {extends: ['@commitlint/config-conventional']})


npm install --save-dev husky

在 package.json 键入
```json
{
  "husky": {
    "hooks": {
      "commit-msg": "commitlint -E HUSKY_GIT_PARAMS"
    }
  }
}
```

git commit -m "feat: 新增XXX需求"

* commit 时格式命令解释
    * build：编译
    * chore：构建过程或辅助工具的变动
    * ci：集成部署
    * docs：文档（documentation）
    * feat：新功能（feature）
    * fix：修补bug
    * perf：提升性能，体验
    * refactor：重构（即不是新增功能，也不是修改bug的代码变动）
    * revert：回滚，撤销之前的commit
    * style：样式（不影响代码逻辑的变动,比如修改了空格，格式缩进，逗号等）
    * test：增加测试相关（单元测试，集成测试）
    

> 可参照 https://github.com/wowjohn/sf44-template 进行配置


#### 合并commit
```text
git rebase -i HEAD~[number_of_commits]
```
```text
git rebase -i HEAD~2
```

```text
pick 41cee30 测试yyyy
pick 87a87f6 fsdfsd

# Rebase 25f3711..87a87f6 onto 25f3711 (2 commands)
#
# Commands:
# p, pick <commit> = use commit
# r, reword <commit> = use commit, but edit the commit message
# e, edit <commit> = use commit, but stop for amending
# s, squash <commit> = use commit, but meld into previous commit
# f, fixup <commit> = like "squash", but discard this commit's log message
# x, exec <command> = run command (the rest of the line) using shell
# b, break = stop here (continue rebase later with 'git rebase --continue')
# d, drop <commit> = remove commit
# l, label <label> = label current HEAD with a name
# t, reset <label> = reset HEAD to a label
# m, merge [-C <commit> | -c <commit>] <label> [# <oneline>]
# .       create a merge commit using the original merge commit's
# .       message (or the oneline, if no original merge commit was
# .       specified). Use -c <commit> to reword the commit message.
#
# These lines can be re-ordered; they are executed from top to bottom.
#
# If you remove a line here THAT COMMIT WILL BE LOST.
#
# However, if you remove everything, the rebase will be aborted.
#
# Note that empty commits are commented out
```

将第二行 pick 改成 squash，保存关闭

会跳出新页面
```text
# This is a combination of 2 commits.
# This is the 1st commit message:

测试yyyy

# This is the commit message #2:

fsdfsd

# Please enter the commit message for your changes. Lines starting
# with '#' will be ignored, and an empty message aborts the commit.
#
# Date:      Mon Oct 14 11:38:24 2019 +0800
#
# interactive rebase in progress; onto 25f3711
# Last commands done (2 commands done):
#    pick 41cee30 测试yyyy
#    squash 87a87f6 fsdfsd
# No commands remaining.
# You are currently rebasing branch 'master' on '25f3711'.
#
# Changes to be committed:
#	new file:   .idea/$CACHE_FILE$
#	new file:   .idea/.gitignore
#	new file:   .idea/deployment.xml
#	new file:   .idea/encodings.xml
#	new file:   .idea/misc.xml
#	new file:   .idea/modules.xml
#	new file:   .idea/test.iml
#	new file:   .idea/vcs.xml
#	new file:   11212.txt
#

```
注释掉其中没有的信息即可：例如 # fsdfsd

关闭即可；若需修改，修改完保存关闭即可