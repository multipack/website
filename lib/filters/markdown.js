const markdownIt = require('markdown-it')({
  html: true,
  breaks: true,
  linkify: true
})

module.exports = (string, value) => {
  if (string) {
    if (value === 'inline') {
      return markdownIt.renderInline(string)
    }

    return markdownIt.render(string)
  }

  return string
}
