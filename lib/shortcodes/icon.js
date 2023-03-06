/**
 * Icon shortcode
 *
 * @param {string} name - Human readable icon name, i.e. GitHub
 * @param {string} [size=1em] - Rendered icon height and width
 * @param {boolean} [hidden=true] - Icon is hidden from accessibility tree
 * @returns {string} SVG
 */
module.exports = (name, size = '1em', hidden = true) => {
  const id = name.toLowerCase()
  const html = hidden
    ? `<svg width="${size}" height="${size}" focusable="false" aria-hidden="true">
      <use href="/assets/vectors/app.svg#${id}"></use>
    </svg>`
    : `<svg width="${size}" height="${size}" focusable="false" aria-labelledby="${id}-title" role="img">
      <title id="${id}-title">${name}</title>
      <use href="/assets/vectors/app.svg#${id}"></use>
    </svg>`

  return html.replace(/(\r\n|\n|\r)(\s\s)*/gm, '')
}
