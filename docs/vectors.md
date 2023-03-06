# Vectors

SVG vector images are used on this website for any logos or icons.

## Logo

The Multipack logo is provided as an inline SVG in [`banner.liquid`](../src/includes/banner.liquid).

## Icons

All icons used on this site reference named symbols in [`app.svg`](../src/assets/vectors/app.svg).

To display an icon to a page, use an inlined `svg` element and reference `app.svg` with the `use` element with the corresponding URL fragment identifier.

For example, the GitHub icon can be targetted using the `#github` fragment identifier: `/assets/vectors/app.svg#github`.

The following icons are currently available:

* Facebook (`#facebook`)
* Flickr (`#flickr`)
* GitHub (`#github`)
* Twitter (`#twitter`)
* Mastodon (`#mastodon`)
* Vimeo (`#vimeo`)

Additional social media icons can be downloaded from [Simpleicons.org](https://simpleicons.org). We resize icons to 96×96 and optimise them using [SVGOMG](https://jakearchibald.github.io/svgomg/).

Icons are added to `app.svg` using [the `symbol` element](https://developer.mozilla.org/en-US/docs/Web/SVG/Element/symbol).

## `icon` shortcode

Use the [`icon` short code](../lib/shortcodes/icon.js) to include SVG icons as this is designed to generate accessible HTML.

This shortcode takes three arguments:

* `name`: The human readable icon name, i.e. GitHub
* `size`: Rendered icon height and width (default is `1em`)
* `hidden`: Icon is hidden from accessibility tree (default is `true`)

For example, to include an icon as decoration next to a text label, keep the defaults and provide only the icon’s name:

```liquid
<a href="https://github.com/multipack/website/edit/main/src/content/pages/homepage.md">
  {% icon "GitHub" %} Edit this page on GitHub
</a>
```

This generates the following HTML:

```html
<a href="https://github.com/multipack/website/edit/main/src/content/pages/homepage.md">
  <svg width="1em" height="1em" focusable="false" aria-hidden="true">
    <use href="/assets/vectors/app.svg#github"></use>
  </svg> Edit this page on GitHub
</a>
```

To use an icon in isolation, provide the icon’s size and set the final argument to `false`:

```liquid
<a href="https://github.com/multipack/">
  {% icon "GitHub" "48" false %}
</a>
```

This generates the following HTML:

```html
<a href="https://github.com/multipack/">
  <svg width="48" height="48" focusable="false" aria-labelledby="github-title" role="img">
    <title id="github-title">GitHub</title>
    <use href="/assets/vectors/app.svg#github"></use>
  </svg>
</a>
```
