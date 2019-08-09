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
    * perf：提升性能
    * refactor：重构（即不是新增功能，也不是修改bug的代码变动）
    * revert：回滚，撤销之前的commit
    * style：样式（不影响代码运行的变动）
    * test：增加测试