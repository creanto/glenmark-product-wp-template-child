# Glenmark Product Child Theme

An example of extending the [Glenmark Product parent theme](https://github.com/creanto/glenmark-product-wp-template). Keep reusable theme behavior in the parent theme and site-specific configuration, styles, templates, and PHP customizations here.

## Installation

Install `glenmark-product` first, then install and activate this child theme. The child theme's `Template` value in `style.css` must match the parent theme directory name.

## Extension points

- `functions.php` registers child-theme hooks and enqueues site-specific styles.
- `site-specific/config/theme-config.php` overrides parent theme configuration.
- `site-specific/assets/css/site.scss` is the source for the enqueued `site.css`; commit the compiled CSS with its source.
- `site-specific/` is the place for site-specific templates and additional PHP modules. Include PHP modules from `functions.php` explicitly.
- `elementor-site-settings/` contains the site's Elementor settings export and manifest.

The Kohinoor font files are not included because the available license is for personal use only. Provide fonts that are licensed for the intended use before adding `fonts.css` and its matching font files under `site-specific/assets/`.