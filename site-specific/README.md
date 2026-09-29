# Site-specific customizations

Use the child theme for changes that belong to one Glenmark website. Keep reusable behavior in the parent theme; keep this site's configuration, styles, templates, and PHP customizations in the child theme.

- `assets/css/site.scss`: SCSS source for site-specific styles.
- `assets/css/site.css`: compiled stylesheet enqueued after the parent `webrev-theme` stylesheet.
- `assets/css/fonts.scss` and `assets/css/fonts.css`: font-face source and stylesheet.
- `assets/font/`: local font files referenced by the font stylesheet.
- `config/theme-config.php`: overrides for values from the parent `config/theme-config.php`. Nested values are merged with the parent configuration.
- `template-parts/header/default.php`: overrides the parent default header.
- `template-parts/header/<name>.php`: adds a header variant. Add the matching variant in `config/theme-config.php` under `layout.header_variants`.
- `template-parts/footer/<name>.php`: overrides or adds a footer variant following the same pattern.

WordPress automatically uses matching template parts from this child theme before their parent equivalents. The child theme's root `functions.php` is loaded by WordPress and currently registers site-specific styles and hooks. PHP files placed in this directory are not loaded automatically; explicitly include them from the child `functions.php`.

The theme enqueues the compiled CSS files, not SCSS. Recompile the CSS after changing an SCSS source and commit both source and output according to the project workflow.
