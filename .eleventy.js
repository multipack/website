module.exports = function (eleventy) {
  // Template libraries
  eleventy.setLibrary('md', require('./lib/libraries/markdown.js'))
  eleventy.setLiquidOptions({
    cache: true,
    dynamicPartials: true,
    greedy: false,
    root: ['./src/_includes', './src/_layouts'],
    strictFilters: true
  })

  // Filters
  eleventy.addFilter('markdownify', require('./lib/filters/markdownify.js'))

  // Plugins
  eleventy.addPlugin(require('@11ty/eleventy-plugin-syntaxhighlight'))

  // Transforms
  eleventy.addTransform('minify', require('./lib/transforms/minify.js'))

  // Post type collections
  // Adding `reversed` Liquid option to `collections.post` doesn’t collate all
  // posts in date decending order, so need to collate and reverse here instead.
  // Setting a default sort order may resolve this. See:
  // https://github.com/11ty/eleventy/issues/367
  eleventy.addCollection('post', collection => {
    return collection
      .getFilteredByGlob(
          '**/+(articles|bookmarks|notes|photos|presentations|projects|replies)/**/*.md'
      )
      .reverse()
  })
  eleventy.addCollection('sitemap', collection => {
    return collection.getFilteredByGlob('**/*.md')
  })

  // Passthrough
  eleventy.addPassthroughCopy({
    './src/images': 'images',
    './src/assets/*.ico': '/',
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
