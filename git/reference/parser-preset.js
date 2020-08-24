module.exports = {
    parserOpts: {
        headerPattern: /^(task|story|bug|chore|ci|docs|perf|refactor|revert|test)(\(\S+\))?: (\d+)-(\S+)$/,
        headerCorrespondence: ['type', 'scope', 'subject']
    }
};