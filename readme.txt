=== Wilson ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.4
Tested up to: 4.8
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Activate the theme

All theme specific options are handled through the WordPress Customizer.


== Licenses ==

Lato
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Lato

Raleway
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Raleway

screenshot.png post image 
License: CC0 Public Domain 
Source: http://www.unsplash.com


== Changelog ==

Version 1.30 (2017-12-03)
-------------------------
- The pluggable update: made all functions in functions.php pluggable

Version 1.29 (2017-11-28)
-------------------------
- Removed conditionals around the_content() output, as the conditional was interfering with plugins using the_content() to output stuff

Version 1.28 (2017-11-28)
-------------------------
- Fixed an issue where empty() was being used on a function in archive.php

Version 1.27 (2017-11-26)
-------------------------
- Updated to new readme.txt format, with changelog included in it
- Removed the theme video widget, as it has been made redundant by the one included in core
- Removed mentions of included translations in style.css theme description due to the new WordPress.org translation handling
- Replace the_title() with the_title_attribute() where it was being used in the title attribute of links
- Wrapped the_content() output in conditionals for empty content edge cases
- General code cleanup and readability fixes
- Removed unneccessary wp_reset_query() in template-archives.php

Version 1.26 (2016-06-20)
-------------------------
- Fixed a fatal error on archive.php

Version 1.25 (2016-06-18)
-------------------------
- Added the new theme directory tags
- Cleaned up, unified, optimized and simplified all PHP
- Centered the editor style body
- Removed the Dribbble widget and associated styles
- Updated the readme
- Updated the translation files

Version 1.24 (2015-08-25)
-------------------------
- Removed <title> element from header (already using title_tag())
- Cleaned up the CSS a little
- Fixed the comments link in post meta to link to the comments section

Version 1.23 (2015-08-25)
-------------------------
- Fixed an issue with overflowing images
- Added the .screen-reader-text class

Version 1.22 (2015-08-11)
-------------------------
- Added the title_tag() function, replaced old custom title function
- Removed the post meta fields for content-video.php from functions.php
- Added a sanitize_callback for the custom accent color settings
- Removed the code displaying the content of the post meta fields from content-video.php
- Moved the post-meta into a function called wilson_meta() in functions.php
- Changed so that the X Comments string in post-meta is not visible unless comments are open
- Removed a add_shortcode function from functions.php
- Changed the title to a h1 element on singular for SEO reasons
- Changed the theme widgets to use __construct()
- Updated the Swedish translation

Version 1.21 (2014-09-02)
-------------------------
- Added the current menu item to the accent color function
- Fixed incorrect display of the next page / read more links in the editor styles

Version 1.20 (2014-08-06)
-------------------------
- Added licensing information for screenshot.png

Version 1.19 (2014-08-06)
-------------------------
- Improved the display of the header and navigation toggle at smaller screen sizes
- Added formatting of forms and inputs to the post content
- Added support for editor style
- Added support for custom logo upload
- Updated the Swedish .mo file
- Optimized style.css for brevity and browser compatibility

Version 1.18 (2014-07-25)
-------------------------
- Fixed so that the "Comments are closed" message isn't displayed on pages with comments deactivated
- Added a query reset to template-archives to prevent the wrong comments from loading
- Removed the default widgets that previously would've been displayed in no widgets had been entered

Version 1.17 (2014-04-08)
-------------------------
- Added .widget_links to the custom accent color setting

Version 1.16 (2014-03-20)
-------------------------
- Added a few missing page elements to the accent color customization option

Version 1.15 (2014-03-20)
-------------------------
- Added a theme option for accent color
- Updated the theme description and theme tags

Version 1.14 (2014-03-20)
-------------------------
- Tweaked the margins of featured-media and post-header
- Fixed a video-widget bug

Version 1.13 (2014-03-03)
-------------------------
- Further fixes to video
- Fixed a bug with the html tag

Version 1.12 (2014-02-24)
-------------------------
- Replaced the embeds in content-video.php, video-widget.php and single.php with WordPress built-in oEmbed function

Version 1.11 (2014-02-18)
-------------------------
- Fixed an issue with iframes in video post format

Version 1.10 (2014-02-18)
-------------------------
- Fixed a security glitch allowing users to enter js in the video post format url

Version 1.09 (2014-02-17)
-------------------------
- Add max-width to .featured-media iframe

Version 1.08 (2014-02-17)
-------------------------
- Fixed :focus text color on widget_search

Version 1.07 (2014-02-17)
-------------------------
- Increased line-height on h3.blog-description and h2.post-title

Version 1.06 (2014-02-17)
-------------------------
- Hidden img#wpstats smiley

Version 1.05 (2014-02-17)
-------------------------
- Fixed the meta tag to be HTML 5 compliant
- Fixed so that placeholder widgets are shown if no widgets have been added

Version 1.04 (2014-02-13)
-------------------------
- Removed excessive license information

Version 1.03 (2014-02-13)
-------------------------
- Added/fixed license information
- Removed redundant functions from global.js
- Added missing theme slugs in functions.php
- Fixed WordPress.tv video resizing
- Added word-break to .post-title to stop long post titles from breaking the design
- Added Swedish translation

Version 1.02 (2014-02-12)
-------------------------
- Updated theme description

Version 1.01 (2014-02-12)
-------------------------
- New screenshot
- Fixed textdomain bug
- Misc bug fixes

Version 1 (2014-02-12)
-------------------------