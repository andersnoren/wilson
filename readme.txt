=== Wilson ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.5
Tested up to: 6.0
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Activate the theme

All theme specific options are handled through the WordPress Customizer.


== Licenses ==

Feather Icons
License: MIT License, https://opensource.org/licenses/MIT
Source: https://feathericons.com

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

Version 2.1.2 (2022-08-30)
-------------------------
- Fixed incorrect order of element closing tags in footer.php (thanks, milchbaum).
- Adjusted the header.php meta tags to match default themes.

Version 2.1.1 (2022-07-01)
-------------------------
- Improved fonts.css enqueue for child themes.

Version 2.1 (2022-06-29)
-------------------------
- Switched from the Google Fonts CDN to font files included in the theme folder.
- Bumped "Tested up to" to 6.0.

Version 2.0.0 (2021-05-04)
-------------------------
- Added "block-styles" to the theme tags in `style.css`.
- Deleted license.txt from the theme files.
- Added the new `/assets/` sub folder, and moved the `/js/` and `/images/` folders into it.
- Renamed the editor style CSS files, and moved them to the new `/assets/css/` folder.
- Created a separate file for the Hemingway_Customize class in `/inc/classes/`.
- Moved the `/widgets/` folder to the new `/inc/` folder.
- Removed the unused `wilson_options` Customizer section.
- Removed the Flickr widget, since the API it relied on for data is being removed.
- Updated the theme description to reflect the removal of the Flickr widget.
- Made the main menu name translateable.
- Added the theme version to all enqueues.
- Added support for the core custom_logo setting, and updated the old wilson_logo setting to only be displayed if you already have a wilson_logo image set.
- Bumped the "Requires at least" tag to 4.5.0, since Wilson is now using custom_logo.
- Added "Tested up to" and "Requires PHP" to readme.txt.
- Updated widget area registration to include widget IDs in output.
- Cleaned up functions.php, added missing function_exists() checks.
- Removed the `wilson_nav_walker` navigation walker class, since it wasn't needed.
- Reworked CSS reset.
- Moved the post content element styles to the Element Base CSS section, made them apply globally, and updated other styles to reflect the new base styles.
- Split remaining post content styles into the Entry Content and Blocks CSS sections.
- Removed the default padding and border from images.
- Moved pagination to pagination.php, improved conditionals, better handling of overflow.
- Added a skip link.
- Restructured the header, content and footer to use semantic HTML5 elements.
- Moved the credits into the footer element.
- Removed all output of title attributes.
- Unified index.php, archive.php and search.php into index.php.
- Unified image.php, single.php and page.php into singular.php (and removed some image.php specific functionality).
- Unified content.php, content-aside.php, content-quote.php and content-video.php into content.php.
- Removed the "Comments are closed" message.
- Replaced the "post-image" image size by setting the post thumbnail size to the same dimensions.
- Replaced clearing divs with classes, flexed containers.
- Removed searchform.php, updated styles to work with default form markup, replaced psudeo element icon with icon from Feather Icons, added licensing information for Feather Icons.
- Updated template-archives.php to use singular.php, moved template specific markup to inc/template-archives-content.php, and added a function that appends that markup to the_content when the template is in use.
- Updated screenshot resolution to 1200x900, and changed file format to JPG reducing theme footprint by 300 kilobytes.
- Removed hooks for body_class and post_class, since the custom classes are no longer needed.
- Increased color contrast for some elements. 
- Added the wide-blocks tag to style.css.
- Fixed unescaped home_url() in footer.php.
- Fixed excessive top margins of buttons in the Buttons block.
- Fixed nested list styles in widgets.
- Improvements to pullquote styles.
- Adjusted block button styles.
- Removed global striped table styles, since it's available as an option for the table block.
- Changed the wrapper to use flex, removing the need for old background image solution.
- Block editor styles: Updated the block width and font families to match the front-end.
- Separator block: Fixed width of style: wide.

Version 1.36 (2019-04-07)
-------------------------
- Added the new wp_body_open() function, along with a function_exists check

Version 1.35 (2018-12-07)
-------------------------
- Fixed Gutenberg style changes required due to changes in the block editor CSS and classes
- Fixed the Classic Block TinyMCE buttons being set to the wrong font
- Fixed the alignfull block class

Version 1.34 (2018-11-30)
-------------------------
- Fixed Gutenberg editor styles font being overwritten

Version 1.33 (2018-10-20)
-------------------------
- Fixed incorrect dates in the archive template
- Fixed potential issue with tags in title attribute in footer
- Fixed Gutenberg gallery items being misaligned
- Added Gutenberg support for alignwide, so alignfull can be used
- Removed the languages folder, since WordPress.org handles that stuff nowadays

Version 1.32 (2018-10-07)
-------------------------
- Updated with Gutenberg support
	- Gutenberg editor styles
	- Styling of Gutenberg blocks
	- Custom Wilson Gutenberg palette
	- Custom Wilson Gutenberg typography styles
- Added option to disable Google Fonts with a translateable string
- Improved compatibility with < PHP 5.5

Version 1.31 (2018-05-24)
-------------------------
- Fixed output of cookie checkbox in comments

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