module.exports = function (eleventy) {
  // Collections
  eleventy.addCollection('sitemap', collection => collection.getFilteredByGlob('**/*.md'))
  eleventy.addCollection('upcoming-events', collection => collection.getFilteredByTag('event').filter(item => item.date > new Date()))
  eleventy.addCollection('past-events', collection => collection.getFilteredByTag('event').filter(item => item.date < new Date()))

  // Template libraries
  eleventy.setLiquidOptions({
    cache: true,
    dynamicPartials: true,
    strictFilters: true
  })

  // Filters
  eleventy.addFilter('markdown', require('./lib/filters/markdown.js'))

  // Shortcodes
  eleventy.addShortcode('icon', require('./lib/shortcodes/icon.js'))

  // Transforms
  eleventy.addTransform('minify', require('./lib/transforms/minify.js'))

  // Passthrough
  eleventy.addPassthroughCopy({
    './src/assets/fonts/': '/assets/fonts',
    './src/assets/vectors/': '/assets/vectors',
    './src/images': '/images',
    './src/images/favicon.ico': '/favicon.ico',
    './src/CNAME': '/CNAME'
  })

  // Watch targets
  eleventy.addWatchTarget('./src/assets/')

  // Enable data deep merge
  eleventy.setDataDeepMerge(true)

  // Config
  return {
    dir: {
      input: 'src',
      output: 'www',
      includes: 'includes',
      layouts: 'layouts',
      data: 'data'
    },
    templateFormats: ['liquid', 'md'],
    passthroughFileCopy: true
  }
}
