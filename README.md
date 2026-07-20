# GoForDigitalIndia WordPress Theme

This repository contains the initial scaffold for the GoForDigitalIndia native WordPress theme.

What I created in branch: feature/GoForDigitalIndia-theme

Files added (initial):
- wp-content/themes/GoForDigitalIndia/
  - style.css (theme header)
  - functions.php (bootstrap)
  - index.php, header.php, footer.php
  - single-business.php, archive-business.php
  - template-parts/content-business.php
  - inc/
    - setup.php (theme supports, menus, widgets)
    - enqueue.php (styles & scripts)
    - cpt.php (business custom post type)
    - taxonomies.php (categories + location hierarchy)
    - meta.php (register_post_meta + meta box)
    - rest.php (basic REST endpoints for business search)
    - theme-options.php (simple Settings API page for theme options)
  - assets/css/style.css
  - assets/js/main.js

Notes & next steps:
1. This is an incremental, modular foundation. It uses WP Core APIs, register_post_meta (REST-ready), CPT + taxonomies and a basic REST endpoint.
2. Important advanced features (maps, claim verification, CRM integrations, membership, importers, analytics, advanced SEO templates and JSON-LD generation) will be added iteratively. Each should be implemented using WP Core hooks and where absolutely necessary, separate composer-managed libraries (no external frameworks).
3. To produce the final installable ZIP, I will prepare the theme folder and export a zip after we iterate on features and tests.

How to test locally:
- Checkout branch `feature/GoForDigitalIndia-theme`.
- Copy the theme folder to your WP installation `wp-content/themes/` or install via GitHub plugin / upload ZIP.
- Activate the theme and create a few Businesses (CPT) to see listing archive and single templates.

Security & standards:
- PHP 8 compatible, uses register_post_meta and nonce checks for meta box saves.
- Follows modular architecture and is ready for expanded features.

Tell me which feature to implement next (examples):
- Google Maps integration (Mapbox/Google) with API key via theme options.
- Business Claim & Verification flow.
- Owner Dashboard and frontend submission forms.
- Membership & Payment integration (Razorpay/Stripe).
- Advanced SEO (dynamic JSON-LD, FAQ Schema, Review schema per listing).
- Importers for CSV, Justdial, Google Business Profile.

I'll proceed feature-by-feature and only modify/add needed files.
