module.exports = ({
  plugins: [
    require('postcss-easy-import'),
    require('postcss-custom-selectors'),
    require('postcss-extend-rule'),
    require('cssnano')({
      preset: ['default', {
        calc: false // Prevent postcss-calc from duplicating rules
      }]
    })
  ]
})
