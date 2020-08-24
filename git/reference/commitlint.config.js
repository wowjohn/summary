module.exports = {
    extends: ['@commitlint/config-conventional'],
    parserPreset: './parser-preset',
    rules: {
        'type-enum': [2, 'always',
            [
                'chore', //构建过程或辅助工具的变动
                'ci', //集成部署
                'docs', //文档
                'perf', //提升性能
                'refactor', //重构
                'revert', //回滚
                'test', //增加测试
                'task', //任务
                'story', //需求
                'bug', //Bug
            ]]
    },
    'body-leading-blank': [1, 'always'],
    'footer-leading-blank': [1, 'always'],
    'header-max-length': [2, 'always', 72],
    'scope-case': [2, 'always', 'kebab-case'],
    'subject-case': [2, 'always', 'kebab-case'],
    'subject-empty': [0, 'never'],
    'type-case': [2, 'always', 'lower-case'],
    'type-empty': [2, 'never'],
}