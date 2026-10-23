# Homepage assets

Photographs are stored locally as optimized WebP files. These are illustrative stock photographs, not photographs of the company's offices, clients, properties or holdings.

| Local image | Source |
| --- | --- |
| financial-district.webp | https://images.unsplash.com/photo-1486406146926-c627a92ad1ab |
| planning-together.webp | https://images.unsplash.com/photo-1556761175-b413da4baf72 |
| real-estate.webp | https://images.unsplash.com/photo-1600585154340-be6161a56a0c |
| global-markets.webp | https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3 |
| agriculture.webp | https://images.unsplash.com/photo-1500382017468-9049fed747ef |

Photo usage: https://unsplash.com/license

Self-hosted DM Sans and Libre Caslon Display fonts come from Google Fonts. Their SIL Open Font License notices are included in `fonts/`. Font subsets retain Latin characters, accents and common punctuation. System fonts remain available as fallbacks.

The homepage is isolated in `resources/views/home/landing.blade.php` and `resources/views/layouts/investment-home.blade.php`. The existing routes, controllers, authentication, dynamic service records, translation component and live chat setting are reused. The stylesheet and script load directly from `public/home/redesign/`; no new npm dependencies or build step are required for this redesign.
