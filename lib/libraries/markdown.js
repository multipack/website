const markdown = require('markdown-it')

module.exports = (() => {
  const opts = Object.assign({
    html: true,
    breaks: true,
    typographer: true
  })

  const plugins = [
    require('markdown-it-abbr'),
    require('markdown-it-deflist')
  ]

  const parser = markdown(opts)

  if (plugins) {
    plugins.forEach(plugin => {
      if (Array.isArray(plugin)) {
        // Allow array of options to be passed.
        parser.use(...plugin)
      } else {
        parser.use(plugin)
      }
    })
  }

  return parser
})()
