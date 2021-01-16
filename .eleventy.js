module.exports = function (eleventy) {
  // Template libraries
  eleventy.setLiquidOptions({
    cache: true,
    dynamicPartials: true,
    greedy: false,
    root: ['./src/_includes', './src/_layouts'],
    strictFilters: true
  })

  // Transforms
  eleventy.addTransform('minify', require('./lib/transforms/minify.js'))

  // Collections
  eleventy.addCollection('sitemap', collection => {
    return collection.getFilteredByGlob('**/*.md')
  })

  // Passthrough
  eleventy.addPassthroughCopy({
    './src/images': 'images',
    './src/assets/favicon.ico': '/favicon.ico',
    './src/CNAME': '/CNAME',
    './README-DEPLOY.md': '/README.md'
  })

  // Enable data deep merge
  eleventy.setDataDeepMerge(true)

  // Config
  return {
    dir: {
      input: 'src',
      output: 'www',
      layouts: '_layouts',
      data: '_data'
    },
    templateFormats: ['liquid', 'md'],
    passthroughFileCopy: true
  }
}
