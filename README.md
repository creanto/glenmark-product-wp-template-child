# Odvozená šablona Glenmark Product

Ukázka rozšiřování [rodičovské šablony Glenmark Product](https://github.com/creanto/glenmark-product-wp-template). Opakovaně použitelné funkce patří do rodičovské šablony; konfiguraci, styly, šablony a úpravy PHP pro konkrétní web udržujte zde.

## Instalace

Nejprve nainstalujte šablonu `glenmark-product`, potom nainstalujte a aktivujte tuto odvozenou šablonu. Hodnota `Template` v souboru `style.css` musí odpovídat názvu adresáře rodičovské šablony.

## Možnosti rozšíření

- `functions.php` registruje hooky odvozené šablony a načítá styly pro konkrétní web.
- `site-specific/config/theme-config.php` přepisuje konfiguraci rodičovské šablony.
- `site-specific/assets/css/site.scss` je zdrojem načítaného souboru `site.css`; při změně uložte do Gitu zdrojový SCSS i přeložené CSS.
- `site-specific/` slouží pro šablony a další PHP moduly konkrétního webu. PHP moduly je potřeba výslovně načíst ze souboru `functions.php`.
- `elementor-site-settings/` obsahuje export nastavení Elementoru pro web a jeho manifest.

Soubory fontu Kohinoor nejsou součástí repozitáře, protože dostupná licence povoluje pouze osobní použití. Před přidáním souboru `fonts.css` a odpovídajících fontů do `site-specific/assets/` zajistěte licenci pro zamýšlené použití.