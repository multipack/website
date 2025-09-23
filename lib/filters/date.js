const { DateTime } = require('luxon')

// @see https://github.com/moment/luxon/issues/118
// @uses 'S' from php.net/date
function ordinal (n) {
  const s = ['th', 'st', 'nd', 'rd']
  const v = n % 100
  return '\'' + n + (s[(v - 20) % 10] || s[v] || s[0]) + '\' '
}

/**
 * Format a date with Luxon.
 * If you provide dS in the format, it assumes you want the ordinal suffix.
 *
 * @param {String} date - string Date
 * @param {String} format - date format (Luxon)
 * @param {String} locale - locale
 * @returns {String} formatted date
 */
module.exports = (date, format, locale = 'en') => {
  date = DateTime.fromJSDate(date).setLocale(locale)
  return date.toFormat(format.replace('dS ', ordinal(date.day)))
}
