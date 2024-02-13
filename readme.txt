=== Flat Blocks ===
Contributors:  XtremelySocial

== Description ==

Flat Blocks is a modern “flat” style theme with a nice color palette, full and wide width support, and support for the new “Full Site Editing” in WordPress. It includes dozens of block patterns and alternate layouts and color schemes.

== Quick Start Guide ==

= Front (Home) Page = 

This theme is designed to work great whether your front (home) page is your blog or a "static page". This theme has a Template Part called "Home Page Top" that displays either way and you can change it whatever you want. By default, it has a cover image with the site title and tagline and colored welcome section with some text.

To check your settings for blog or static page, go to Settings -> Reading in the WordPress Admin Dashboard.

Note that if you have the blog set on the home page, it uses the Template called Index ("index.html"). If you have the home page set to a page, it will use hat page and the blog page uses the Home template ("home.html").

= Menus = 

Right away you'll want to go into the Site Editor and select the navigation menus you want for the header and the footer. Once you do, your old menus will be copied into the header and footer templates and stored there.

Note that if you are running the Gutenberg Plugin and have menus assigned to "header" and "footer", they should be defaulted already. Otherwise, go into Appearance -> Customize -> Menus -> View All Locations and select them there. WordPress v6 doesn't have this functionality.

= Header, Footer, and Blog Layouts = 

One of the cool things about this theme is that we provide numerous header, footer, and blog layouts (Query Loops). While you are in the Site Editor, check them out. Just be sure to replace the "Header Default" block not the main Header block. The same thing applies to the "Footer Default". For blog layouts, change the "Query Loop" block instead of the Query block.

Note that the theme is setup this way so that you can change the header, footer, and query layout across the entire site. If you change the actual Header, Footer, and Query blocks, you'll only be changing them on the Home Page that you are editing by default in the Site Editor.

= Page and Block Patterns = 

This theme provides TONS of Block Patterns that you can insert into your pages and posts to quickly build out content. It also includes full Page Patterns that will pull in a whole series of Block Patterns to easily build a Home, About, Services, or Portfolio page. 

Note that Block and Page Patterns are copied into your page or post and unlike Block Templates above, edits you make to Block Patterns are stored only on that page or post.

== Creating a Child theme of Flat Blocks ==

= Using the Create Child Theme Plugin =
Use the [Create Block Theme](https://wordpress.org/plugins/create-block-theme/) plugin.

Install Flat Blocks (or any Flat Blocks child theme)
Use the Full Site Editor to adjust any global styles, templates, template parts, etc. to your liking.
Install the Create Child Theme plugin 
Use it to export a new child theme of Flat Blocks

== Create a Child Theme Manually ==

Flat Blocks is a [parent theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/#what-is-a-parent-theme). The best way to use it is to create a child theme with Flat Blocks as a parent.

= style.css (Required) =

Create a directory for your child theme at the same level as other parent and child themes. Name the directory something like flat-blocks-child.

A Child theme needs a `style.css` file that links its template to the partent theme.

The `style.css` file contains the name of the theme and other details. To make Flat Blocks the parent theme it is important to set the "Template" property to `flat-blocks`.

```
/*
Theme Name: {newtheme}
Theme URI:
Author:
Author URI:
Description:
Requires at least: 6.2
Tested up to: 6.3
Requires PHP: 7.4
Version: 1.0
License: GNU General Public License v2 or later
License URI:
Template: flat-blocks
Text Domain: {newthemeslug}
Tags:
*/
```

The Flat Blocks parent theme will automatically load this child theme's `style.css` file for you. You don't even need a `functions.php` file to do it. You can place any CSS rules that you want in here.

= screenshot.png (Recommended) =

It is recommended that you create a `screenshot.png` for your child theme or at least copy down the parent theme's screenshot so something displays in the WordPress Admin.

If you create one, it should be 1200x900 pixels and you should compress it to reduce its size to be suitable for limited bandwidth.

= theme.json (optional) =

You can also include a `theme.json` file in the child theme root directory. This file defines the look and feel of your theme: colors, fonts, spacing, etc. are all set in this file. Flat Blocks also defines some custom properties in theme.json which are used in the CSS. You can override any values (including the custom values) found in Flat Blocks's theme.json in the child theme's theme.json.

- It is only necessary to define those properties you wish to change, which keeps your code [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself).
- As more features are added to block themes, Flat Blocks will be updated to support them. By using Flat Blocks as a parent, the child theme will inherit all these changes.

= Templates and Template Parts (optional) =

You can also place Block Templates and Block Template Parts into your child theme. They should be placed in /templates and /parts subdirectories, respectively. They are used to display the various pages and posts on your site. You can copy down the Flat Blocks theme full directories or individual files and override them with the Site Editor.

Simple child themes should be able to define everything they need using only the `style.css`, `theme.json`, and Template Parts and Template files, but for more complex child themes, an additional CSS file and/or `functions.php` file may be useful.

= custom-style.css =

If you place a CSS file in `/assets/css/custom-styles.css`, the Flat Blocks parent theme will load it automatically. If you have a lot of CSS rules, this is generally cleaner than adding them to the main child theme's `style.css`.

= functions.php and more =

If you place a `functions.php` file in the main child theme directory, PHP can be used to override many more aspects of the theme that aren't possible with the other files above. For example, you can add your own Block Patterns and/or custom Block Styles. The Flat Blocks parent theme provides several "filters" in addition to the ones built into core WordPress.

Take a look at the `/inc/block-patterns.php` and/or `/inc/block-styles.php` files and look for the lines that read `apply_filters`. You can then use an `add_filter` to `functions.php` to alter the arrays. 

If you plan on adding a lot of block patterns or custom blocks styles, rather than putting them into `functions.php` you can put them into `/inc/block-patterns.php` and `/inc/block-styles.php` and those will be loaded automatically.

= Full Child Theme Directory Structure =

Here is a visualization of the structure of a fully built out child theme:

/flat-blocks-child/
   |--- style.css (required)
   |--- screenshot.png (recommended)
   |--- theme.json (recommended, only changed values)
   |--- functions.php
   /assets/
      /css/
  	     |--- custom-styles.css (auto loads, if found)
   /inc/
      |--- block-patterns.php (auto loads, if found)
	  |--- block-styles.php (auto loads, if found)
   /parts/
	  |--- *.html (auto loads)
   /templates/
	  |--- *.html (auto loads)
   /patterns/
	  |--- *.php (auto loads, if found)
	  |--- *.html (load with add_filter)

= Keeping The Parent Theme Up to Date =

When you modify a child theme as opposed to make code changes to a parent theme, the parent theme can be easily updated as new releases come out without necessarily impacting your child theme.

Of course if there are major changes to the parent theme, it may impact your child theme, so be sure to read the release notes for the Flat Blocks theme to see what has changed with each release.

== More Information About This Theme ==

For more information, see these pages on the XtremelySocial.com website:
* How to use our Block Themes: https://xtremelysocial.com/userguide/block-themes/
* Our Theme Block Styles: https://xtremelysocial.com/userguide/block-styles/
* Our Theme Block Patterns: https://xtremelysocial.com/userguide/block-patterns/

You can check out our other themes here: https://xtremelysocial.com/wordpress/

== Changelog ==

= 1.4.6 = 
Feb 13, 2024

* Added a new cover image that is an antique typewriter and a pattern to insert it in the Block Editor. The image itself is in the /assets/images/ folder if you want to upload it to your Media Library. 
* Changed default box shadows for buttons to "tone them down" from the WordPress defaults. The WordPress defaults from least amount of shadow to the most are: natural, deep, sharp, outline, and crisp. We toned down natura and deep and set the old natural to sharp. Outline and Crips remain the same.
* Enhanced CSS for latest post block featured images with border and image galleries with image titles.
* Changed the Compact Footer Template Parts to consistently use "footer-info" as the ID and CSS class. This is to differentiate them from the larger footers that use "site-footer" ID and CSS class.
* Adjust the bottom padding on featured images in the Latest Posts block.
* Don't put bullets on Latest Posts block if it is the Grid layout. i.e. Only do it for list style.
* Changed the menu and social link icon hover animations to use "ease-in" instead of "ease" (changed in theme.json).
* Rename /src/sass folder to /src/scss and add sass-watch.sh for devs to compile the /src/scss files to /assets/css.

= 1.4.5 = 
Jan 25, 2024

* For fixed headers, line up mobile menu open and close buttons.
* Changed custom variable in theme.json --wp--custom--button--shadow to --wp--custom--shadow--default. This specifies a drop-shadow to use or "none" for buttons (and the fixed header). To specify one, use var(--wp--preset--shadow--natural).
* If a default shadow is specified, add it to the fixed header, latest post featured images, and blog featured images in addition to buttons.
* Enhanced CSS for navigation menu hover color to work with colored header backgrounds.
* For Groups with flex (Rows) and "No Wrap" specified, go ahead and wrap on mobile screens. Otherwise, the layout is broken. 
* Added a little more space to the top of the Cover Scroll Home Header cover image text. 

= 1.4.4 = 
Jan 12, 2024

* When a Pages list in a Navigation Block has a drop-down menu, highlight the drop-down title on hover like for other menu items.
* Remove some headers and a footer that were for testing only.

= 1.4.3 = 
Jan 11, 2024

* Default Detail Block Header (summary line) to Primary color and set to primary-alt color when open. However, you can choose a font on an individual detail block to override it.

* Font and link colors now default to light color on dark colored backgrounds.
	* For groups, columns, buttons, and paragraphs, foreground-alt is used (off-white by default).
	* For Cover image block, black or white is used like core WordPress does, but base it on the percent opacity of the cover image overlay. 40% or greater will use white, otherwise black is used. For other blocks, such as Groups and Columns, foreground-alt is used on the dark-colored backgrounds. 
	* For Navigation Block, replaced some of the CSS by using theme.json. This results in ANY navigation bar using the primary color on hover including the footer nav. 
	* For Block Patterns and Template Parts, removed foreground-alt, off-white, and white font colors since they now default based on the background color.
	* Updated Static Map & Address and Jetpack Map & Address Block Patterns (and the footers that use them) to use "Dark" background color instead "Almost Black". This will leave the link color as "Primary" instead of changing it to "Foreground Alt" based on the new default link color rules above.
	* Updated all the necessary Global Theme Styles to add a bit of CSS to override some of the above font and link color defaults. Mainly for the shades of yellow where dark text is more readable than off-white.

* Added Custom Block Styles for Links:
	* Link Underline on Hover for Paragraph, List Item, Latest Posts, Latest Comments, Page List, and Post Title
	* Link Underline and Link No Underline for Post Title and Post Terms. Set Post Terms (category and tag lists) to not underline links by default. 

* Adjusted top and bottom spacing on comment section.

* Fixed typo on the word "Query" in various Block Patterns and the corresponding language translation file (.pot).

* Enhanced smooth scroll javascript for potential future additional header type. 

= 1.4.2 = 
December 12, 2023

* Breaking change to default link underlines
	* Default links to have underlines to comply with WordPress.org theme guidelines where "underline is the only accepted method of indicating links within the content". Note that we had already turned off link underlines on numerous blocks (via Global Styles), such as lists, category and tag cloud, etc. so this should just properly underline links in your main content. 
	* Due to above, updated various Template Parts and Patterns to not underline links. e.g. Page Home pattern, Page Portfolio pattern, Pricing Table patterns. 
	* Added Custom Block Style for List Items to specify link underline or not. 

* Adjustments to horizontal padding
	* Adjusted spacing on post author avatar and bio on Author Page Template.
	* Removed specific horizontal padding from the Compact Footer and Fixed Header Template Parts so that it defaults to the global style Layout -> Padding setting. Adjusted Editor CSS for this. 
	* In the Editor, fix left padding on Latest Posts list when styled with Bullets.

* Changes to global theme styles
	* Renamed Global Theme Style "Dark - Almost Black" to "Dark - Very Dark Gray" to more accurately reflect the background color. 
	* Changed Global Theme Style "Default - Auto Dark Mode" to have the WordPress Admin Bar (if turned on by the logged in user) to Almost Black color to distinguish it from the dark background color. 
	* Reordered the global theme styles: Move Dark Midnight Blue, Dark Almost Black, and Auto Dark Mode earlier in the list. Move Default with Shadow and Default Blue Links towards the end of the list. This shows off more of the color options earlier in the list.

* Changes to cover images block patterns
	* Changed all the Cover Image Block Patterns to have the subtitle as Heading Level 3 (H3) instead of H2. The Title is still H3. 

= 1.4.1 = 
December 2, 2023

* Updates for WordPress v6.4:
	* Updates to Editor styles for older HTML-based buttons, forms, etc. WordPress v6.4 has removed the .wp-site-blocks class from the block Editor so all the styles using that had to be updated.
	* Default column spacing (gap) on flex columns just like on other columns (by default 18px). WordPress v6.4 sets this to zero for some reason so there is no spacing between columns. Note that the user can override this on individual columns blocks, if desired. 
	* In the Editor, fix site title link to be the primary color.
	* Fix custom styles for List block with Checkmarks and Plain Centered.
	* For theme users coming from the TwentyTwentyThree or TwentyTwentyFour theme, changed the mapping of that theme's base color to our foreground-alt color, base color 2 to light gray and base color 3 to gray. This is mainly for when a user set their background and foreground to one of these base colors. In that case, the text would be indistinguishable from the background.
* Don't set older-style input buttons to have light border on colored backgrounds. Instead, users can replace the older style buttons with the Button block and choose Outline style.
* Added custom styles for user to set link underline or not on Categories, Latest Posts, Latest Comments, and Page List blocks.
* For global theme style Source Sans & Source Serif Pro, slightly increase the font weight on the Site Title block because this font is very thin.

= 1.4 = 
November 23, 2023

* Block Patterns
	* Added Block Patterns for Content with Right Sidebar and Content with Left Sidebar. This allows you to make any individual page or post have a custom sidebar that you can put anything you want into.
	* Fix Pattern Image with Computer Screen Title and Text to use the newer preset spacing format.
	* Changed the full-page Block Patterns for About, Home, Portfolio, and Services to use the other block patterns to build the page (<!-- wp:pattern /-->) rather than the custom function flatblocks_get_block_pattern(). This makes the code easier to maintain.
	
* Global Styles Enhancements
	* Changed the default global style setting to not underline links except for in paragraph blocks. Previously link underlines were defaulted everywhere but then overridden in global styles for most blocks, such as the site title, list block, query pagination, etc. By changing to no link underline except in paragraphs, 3rd-party plugin content links will not default to having underlines. We had already provided custom styles on paragraphs to either show or not show link underlines, so this can continue to be controlled at the individual paragraph block level.
	* Center separator block by default (change left and right margin in global theme styles to "auto").

* CSS Enhancements and Fixes
	* Enhancement for the WordPress v6.4 new image "lightbox" ("expand on click"): Hide caption on our custom style for Image with Computer Screen.
	* Lighten day numbers on Calendar block when using a global theme style with a dark background. 
	* Enhance CSS to allow users to manually add Dashicon icon CSS to paragraphs. e.g. "dashicons dashicons-before dashicons-arrow-up-alt2" will add an Arrow Up icon before a text link, such as in the footer nav.
	* Enhanced the CSS for theme compatibility with background/base and foreground/contrast colors. This is for users of TwentyTwentyThree and other themes that use base and contrast colors moving to this theme which uses background and foreground colors. Accent color(s) now map to this theme's primary color too.
	* Style older form reset button styles to match the theme button styles.
	* Align built-in (Dashicon) icons to the top so they align better with text.
	* Default social link icons to be centered.

* Javascript Enhancements
	* Enhance smooth scrolling on internal links to page or post comments to account for fixed header height.

= 1.3.12 = 
September 26, 2023

* Enhance CSS for Social Links, Paragraph "link no underline" style, Query block needed for WordPress.org theme preview.

= 1.3.11 = 
September 26, 2023

* Enhance CSS for horizontal padding and buttons on colored backgrounds primarily for when  previewing the theme on WordPress.org.
* Increase font-weight on comment author name.

= 1.3.10 = 
September 16, 2023

* Defaulted links to underline on post/page content and in comment contents per WordPress.org Theme Guidelines. So then set various other theme elements to not underline links in theme.json, such as post title, post date, post author name, lists, etc. Also updated the various footer template parts to set the paragraph style to not underline links. Note that the no underline paragraph style was also changed to "is-style-link-no-underline" (previously it was "is-style-no-link-underline").
* Increased the font weight on the new WordPress v6.3 Details Block heading line (called "Summary").
* Center-align captions by default in the Block Editor. The CSS there is different than on the front-end, so had to add this to /assets/css/editor-styles.css.

= 1.3.9 =
September 11, 2023

* Added "Page Featured Image with Left Sidebar" and "Page Featured Image with Right Sidebar" templates for those that like a more "classic" look to certain pages. 
* Enhanced footers with maps to not have top and bottom margin on them since these footers have dark backgrounds and would let the light background show through. Also updated the contact info on them to include an email address. 
* Enhanced functions.php to add two new filters that can be used to alter the way WordPress and this theme loads its stylesheets. By default, everything works the same way as it has in prior versions, so you shouldn't see any difference. If a child theme overrides these default values, it will tell WordPress and/or this theme to load individual block styles separately. The logic is smart enough to only load block styles for ones in use on any given page or post. This enhancement was done to pave the way for taking advantage of any performance enhancements in WordPress. From our testing, however, this tends to lower performance scores not improve them so that is why this is turned OFF by default. To override the defaults and turn on separate block style loading, add the following to functions.php in your child theme.
	add_filter( 'should_load_separate_core_block_assets', '__return_true' );
	add_filter( 'flatblocks_should_load_separate_block_assets', '__return_true' );
* As a result of above, we are now including invidual block styles in the /assets/css/blocks/ directory. These are only used if you override the default setting above, but if you do, they are needed.
* Simplified CSS in editor-styles.css to remove .is-root-container before each CSS style because that was only needed when also loading these styles on the front-end.
* Enhanced CSS in the Editor for horizontal spacing (padding) on tablet and mobile.
* Enhance CSS for groups that are header, footer, or main. Top padding will be removed automatically and left and right padding will depend on whether site horizontal spacing is needed (.has-global-padding).
* Enhanced our function that loads block patterns to alter the theme name not just for child themes but now also for parent themes created from Flat Blocks. i.e. The theme slug is now overridden whenever the theme slug isn't exactly 'flat-blocks'.

= 1.3.8 =
September 9, 2023

* Enhanced Post Featured Images to use the new WordPress v6.3 "aspect ratio" feature to set them to 16:9 format. This is the format the theme has always intended to use and all included images are in that format and the theme even adds two additional image sizes that are also 16:9 format. Now this aspect ratio will be honored on all Post Featured Images. Note that this was NOT done to Cover images. Those images are intended to also be in 16:9 format, but the user can set the "minimum height" to make them shorter and we don't want to override that. 
* Updated border and spacing on some styles in theme.json to prevent crashing the Editor. Specifically these were values set to reference other styles ("ref":). These are replaced now with custom border settings (--wp--custom--border--style and --wp--custom--border--radius) and preset spacing (--wp--preset--spacing--40). Block Styles effected are: Code, Featured Image, Spacer, Separator.
* Put back default of centering figure captions (images and tables) as there are some situations where the user can't alter it, such as when left or right aligning an image.
* Moved all editor styles into their own stylesheet (/assets/css/editor-styles.css). This reduces the front-end CSS which helps performance a bit.
* Removed ID's from all images and queries used in patterns. They weren't a problem, but WordPress suggests removing them.
* Refactored flat-blocks.css and custom-styles.css to move non-critical core block styles to custom-styles.css. This way the flat-blocks.css file contains all the styles needed to render the vast majority of "above the fold" content. Also, we implemented SASS behind the scenes to generate the theme's CSS files. This will let us change how various styles load more easily in the future.

= 1.3.7 =
September 7, 2023

* Style the Tag and Category Cloud alternate Outline style to use the theme's border radius (5px by default) and padding. 
* Enhancement to Block Styles logic to allow inlining styles or referencing a registered style handle. This is mainly for child themes or possible future performance enhancements as WordPress v6 evolves.

= 1.3.6 =
September 6, 2023

* Quick fix for Custom Block Styles not loading (block-styles.php).

= 1.3.5 =
September 6, 2023

* Quick fix for Query Patterns: Sidebar Left, Sidebar Right, and Single Column that were creating issues if running PHP v8+.
* Quick fix for Cover Colored Blocks Pattern.
* Enhanced block-styles.php to not issue a PHP warning if malformed block array passed to it. This is a nice touch for child themes that may add a filter to override or add custom block patterns.

= 1.3.4 =
September 5, 2023

* In header navigation, use the primary color as the link hover color. Note that if the header color is overriden by the user, this won't apply. The chosen color will just be lightened like it worked prior to this change.
* In header navigation, also highlight the current menu item (or parent item). By default, the primary color will be used (light green). On user-colored headers, bold will be used.
* Reduce default cover image overlay color to 40% (was 60%) on the colored block image to allow more of the image's natural colors to show through.
* Updated screenshot to reflect highlight of home page link and lightening of cover overlay in the site header.
* Set footer columns to use thick gap to match pages with sidebars. The thick gap style is twice the standard block gap (which is preset spacing 40 that is responsive up to 18px). So the gap is up to 36px now.
* Don't automatically center figure captions (image, table, etc.) since the user can specify what position they want it in (and it defaults to left).
* Added an anchor link of #wrapper at the top of each page for the theme preview on WordPress.org and for users with older navigation menus that point to that as it was the standard on older WordPress themes (before Block based themes). This theme uses #page and that still works as well.

= 1.3.3 =
September 3, 2023

* Locked numerous theme elements that are critical to the templates, such as the main group for the page/post, sidebar on the templates with sidebars, etc. These can always be unlocked by the user, but will prevent accidentally deleting critical template components.
* Set separators to not default to centered (but of course allow the user to center them).
* Removed footer from Post Content Only template. This template is designed to be like a "landing page" where all of the content is built on the page itself. i.e. The user will create a unique header and/or footer, if desired.
* Enhanced CSS for:
	* WordPress Admin Bar on mobile to make sure it stays in its fixed position.
	* Padding and background color on Fixed headers.

= 1.3.2 =
September 1, 2023

* Added Post Featured Image with Left Sidebar and Post Featured Image with Right Sidebar templates for those that like a more "classic" look to their blog posts. 
* Turned off WordPress loading core block CSS files separately. This was supposed to improve performance, but in practice it doesn't because it causes more files to need to load before the page displays. 
* Enhanced the CSS for horizontal spacing on mobile. Don't allow user to set it to zero on headers, footers, or on the comments template part. 
* Enhanced the CSS for cover block inner content to allow for full-width groups if desired. The default is still wide-width though.
* Enhanced Dashicons CSS so the icons better match the element you are placing them on. For example to match the font size and font weight.
* Set links and navigation links to simply default their font-weight (by removing the font-weight designators in theme.json). This allows the font-weight to be overridden on individual blocks. Also, set hover color on Site Title link. 
* Enhanced the smooth scroll javascript to better calculate the scroll position with the new fixed header logic.
* Set dependencies on child theme styles so they are sure to load after the Flat Blocks ones. 

= 1.3.1 = 
August 31, 2023

* Rewrote all the logic for Fixed Headers and Fixed Nav Menus. They now both work in the Site Editor! The extra "hidden" group for the #page anchor for smooth scrolling isn't needed anymore either. This also removes the requirement for the fixedheader javascript, so site performance is improved. 
* Disabled the "Sticky" Group block option in the Editor because it didn't work anyway and could conflict with the new fixed header logic.
* Adjusted the smooth scroll javascript to work with this new fixed header method. 
* Tweaked the CSS for horizontal padding and vertical margin on the front-end and in the editor. Updated some of the custom styles to use block-gap instead of preset-spacing-40. This was only done where it was used for the same purpose as vertical gap.
* Fix for child theme style.css not loading in the Block Editor
* As a result, the Editor now matches the front-end even better!
* Added new Post No Comments Template for when there are historical comments that you no longer want to display on a post. 
* Tweaks to the CSS for plain style lists (no bullets or numbering) to add some bottom margin to better separate them.
* Adjusted small and normal social icon sizes up a bit (22px and 26px respectively).
* No longer load the theme's style.css since it is only required by WordPress to describe the theme itself. There is no actual CSS in it. The CSS for this theme is in /assets/css/flat-blocks.css and /assets/css/custom-styles.css.
* For child themes, their /assets/css/custom-styles.css will now be automatically loaded into the Editor if it exists.
* Updated this readme.txt file to clarify and enhance instructions for creating a child theme.
* Updated the Custom Block Styles logic to allow for non-core styles. This was done in case anyone wants to add custom block styles to blocks added with a plugin, such as Jetpack. Just pass in jetpack/whatever-block instead of core/whatever-block or just whatever-block.

= 1.3 =
August 20, 2023

* Updates and enhancements specifically for WordPress v6.3:
	* Added Frequently Asked Questions (FAQ) Block Pattern now that WordPress v6.3 includes a "Details" block. This block can hide detailed text and display it when the user clicks on the "Summary" (title).
	* Added the FAQ Block Pattern to the Services Page template.
	* Now that WordPress core block styles are pretty complete as of v6.3, we no longer include the "extra" block styles. i.e. loaded through add_theme_support( 'wp-block-styles' ). Those were conflicting with the theme and user global style settings as WordPress v6.3 for some reason places them later in the generated CSS style sheet.
	* Dashicons (icon font) now display properly when editing pages or posts in the new Block Editor. This refers to the calendar, comments, scroll down arrow, etc. Changed the way these Dashicons are loaded now that the Block Editor uses iframes.
* Additional updates and enhancements:
	* Separator and pull quote blocks now defaults to the theme style's primary color to match reqular quotes (by default this is light green).
	* Styled the Table with Stripes style.
	* Optimized all included image assets to reduce their size while retaining good quality for the web. 
	* Added section in this readme.txt file about how to create a child theme of Flat Blocks

= 1.2.14 =
August 16, 2023

* Added the Roboto Mono font and set it to the default for code and preformatted blocks.
* The Fixed Mobile Nav Menu can now be centered in addition to positioned left or right.
* Fixed issue with Menu Never Mobile where it was going mobile on small screens. Also added a group to it so there is margin between it and the site title. 
* Added custom page list styles for checkmarks and plain lists, so you can now choose those styles for them just like on regular lists.
* For Media & Text block with border style, round the edges and add a bit of padding to be more similar to post thumbnail images.
* Enhanced the smooth scrolling to factor in whether the site is displaying the Admin Bar or not. This is most beneficial for cover blocks with scroll to content sections. 
* Made some code optimizations to the fixed header javascript.
* Cleaned up the horizontal padding CSS rules to reduce the number !important designators. This gives user more control in adding their own padding to blocks, but will still overriding the left and right padding on mobile devices so all the blocks line up nicely with consistent margins.
* Moved the theme's pattern-related functions into its own 'pattern-functions.php' file in the /inc directory. Added inclusion of that file into the PHP-based patterns that use it. This is to help when admins are using the WP-CLI command line utilities.

= 1.2.13 =
July 24, 2023

* Added logic to the sample page Patterns to make sure the necessary theme functions have been properly loaded. Specifically flatblocks_get_block_pattern().
* Added one more Template Part Area called "Menu". This should be useful in a future version of WordPress. 

= 1.2.12 =
July 18, 2023

* Added some sample navigation links to the various Footer Menu template parts. This is to prevent WordPress from displaying a complete list of the sites pages in the footer. Of course once the user specifies an actual footer menu, the sample links get overridden. Note that for the header menu, the default behavior of displaying the full pages list is still in place as it makes sense there.
* For Site Title, remove link hover color from theme.json so it defaults from the general link hover color or a custom link color if the user specifies one. This was done to the various global theme styles that set the Site Title link hover as well.
* Adjusted mobile nav menu padding to better match site header padding.
* On Author Page Template, fix alignment of the author name.
* Fix input select box font color when previewing theme on WordPress.org. Specifically, set the font to the Foreground color.
* On the global theme style Default Drop Shadow, fix the drop-shadow on buttons. 
* Added some sections to categorize Template Parts. This will be useful in a future version of WordPress. Added Title, Sidebar, Query, Comments, Menu, and Content (for everything else). WordPress already has Header and Footer.

= 1.2.11 =
July 17, 2023

* Enhancement to Auto Dark Mode global theme style to also darken the drop-down menus and mobile menu.
* Fix issue with global theme style: Purple, Yellow, & Midnight Blue causing it to not show up as an available style in the Editor.
* For fixed mobile nav, allow positioning left, center, or right by adjusting it's group container. 
* Remove theme name from the header template parts. This should allow child themes to override them.
* Remove menu reference# from the various menu template parts. This should help with WordPress navigation fallback logic. That means it should do a better job at finding an appropriate menu from your site.

= 1.2.10 = 
July 11, 2023

* Added global theme style for auto dark mode! This is the second style right afer the default one. It will automatically change to a dark background with light text when the operating system gets set to dark mode. For example in Windows, iOS, etc.
* Added two new colors: Light Blue and Light Yellow. Updated the theme gradient colors to use them to provide a wider range of color. Also updated the Orange, Yellow, & Midnight Blue global theme style to use the new light yellow color. Updated the Yellow, Orange, & Midnight Blue global theme style to bold links in Post and Page content so they stand out more. 
* Refine CSS for images with hard-coded widths, mainly for the WordPress.org theme preview which uses older (non-block) markup.

= 1.2.9 = 
July 7, 2023

* Refine CSS for buttons to reduce unintentional styling of buttons in 3rd-party plugins.
* Refine CSS for images with hard-coded widths to reduce the chance of breaking the page layout. 
* Update minimum PHP required to v7.4, which is the minimum that WordPress itself recommends. Note that PHP v8.1 is preferred, but this theme doesn't require anything beyond what WordPress itself does.

= 1.2.8 = 
July 5, 2023

* Adjust logic for blog on home page so that it shows the extra "Content Top" Template Part only on the first page.
* Remove large padding in all Header Template Parts, so now defaults to Small spacing.
* Along with Header padding changes, remove Header Compact since its no longer any different than Header Default.
* Add template parts for footer block 1, block 2, and about block. Update the footer templates that use them. This way when the component blocks are edited, the updates will be reflected in all the footer templates that use them.
* In conjunction with adding the footer blocks, revise the CSS for vertical margin on template parts.
* Only display Post Comment Count on blog if Gutenberg plugin is enabled. This Block isn't part of standard WordPress. This was done with a new hidden pattern (hidden-post-date.php).
* Adjust font-size on Site Map page template to match the others ("larger" font size).
* For global theme style with drop-shadow buttons and link underlines, remove underline from nav menus
* Set Post/Page Excerpt length to 25 words if used in Post Title or Page Title Template Part. However, it still uses the default 55 words on the blog. 

= 1.2.7 = 
June 30, 2023

* Clean up CSS for input fields and buttons
* Updated readme.txt to discuss setting the blog or a page as the site home page.

= 1.2.6 = 
June 28, 2023

* Update icon color to be white for social media icon patterns, both 3-column and 4-column. This looks better on all colored-backgrounds.
* To better support user's older post and page content and older plubins, added CSS to style non-block buttons, forms, and input fields to better match the block-based ones styled in theme.json.
* For Comments template part, keep avatar and user name on the same line (don't collapse on mobile)
* Added bottom padding on sidebar
* Add filter for child themes to be able to specify whether to remove core WordPress block patterns or not. The filter name is 'flatblocks_remove_core_patterns'. The default is true.

= 1.2.5 = 
June 27, 2023

* Fix issue with CSS for images with hard-coded dimensions

= 1.2.4 = 
June 26, 2023

* Update theme screenshot to show primary, secondary, and tertiary color for a better theme preview on WordPress.org.
* Update the CSS for images to prevent older block editor markup that uses wp-block-caption from breaking the layout. 

= 1.2.3 = 
June 26, 2023

* Fix font color on post meta box when using dark theme style.
* Darken link color on Purple global theme style.
* Change Title and Text block pattern to have secondary background color so its different than the cover image which uses the primary color.
* Fix WordPress bug where columns block doesn't have gap in the Block Editor.
* Added feature to functions.php to load child theme's /assets/css/custom-styles.css file if it exists.

= 1.2.2 = 
June 23, 2023

* Updates for more accurate theme previews on WordPress.org Theme Directory:
	* Remove bottom margin on columns block
	* On blog, put date and comment count on the same line to take up less space
	* Renumbered global theme styles so more colorful options are at the beginning.
* When Gutenburg plugin active, allow user to set various menus in the Customizer. This is an easy way to assign menus without having to edit the menu Template Parts themselves.
* Cleaned up some CSS for the included Dashicon font icons, image block top margins, featured image top margin, post content bottom margin, heading bottom margin, post title line height, and image captions on dark backgrounds.
* Change font color to foreground-alt on pricing tables and social icons to look better on theme styles with dark backgrounds.

= 1.2.1 =
June 21, 2023

* Updates for inclusion in the WordPress.org Theme Directory:
	* Added content to the top of the front (home) page for when the user has it set to display the blog. So added a template part for Content Page Top and a Front Page template in PHP to conditionally load it when appropriate. Also added Home template for the blog when static page is set to the front page.
	* Modified Page Home template and pattern to match the new front page template.
	* Updated the screenshot to match the new front page template.
* Updated entry content bottom margin to be on the last block so that user can override it by setting margin-bottom to 0.
* Added spacing around Team block patterns (both 3 column and 4 column).
* Changed custom page templates Page Featured Image and Page Featured Cover to allow full width.
* Removed CSS classes on <main> to denote template file since WordPress already puts this on the <body> tag.
* Fixed issue with images not having top margin according to the overall vertical spacing.
* Added post date and author fields to Post Meta, specifically so post templates without title will show this information.
* Changed template part name for default query to query-loop-2-columns to better denote which layout it is. 


= 1.2 =
June 8, 2023

Updates for WordPress v6.2:
* Updated the theme to use core WordPress v6.2 default, wide, and full width handling (useRootPaddingAwareAlignments). Set the overall layout to have left and right padding (preset spacing 50 which is responsive from small to large).
* In conjunction with the above, updated all templates to use the new "layout":{"type":"constrained"} versus the old "layout":{"inherit":true}. This is important for properly handling full and wide with layouts.
* Added more preset responsive spacing sizes and renamed them to match core WordPress v6.2.
* Fixes for various block patterns for WordPress v6.2: all the cover images, the button in the 2-column call-to-action, and the large social media icons.
* Added new pattern for Call to Action Rounded. This is a wide-with group with colored background and rounded borders.
* Added new pattern for Testimonial. This is a full-wide colored group with profile pic, quote, and the person's name.
* Cleaned up Quote styling, such as vertical space above the quote author (cite).
* Remove bold font files (weight 700) as we use weights 300, 400, and 500 only. This reduces the overall size of the theme.
* Updated the various theme styles that specify fonts to set it at the heading level now that WordPress v6.2 supports that. Previously we had to specify each individual h1, h2, h3, etc.
* Reduced the number of custom group styles to only the ones used directly in the theme templates, template parts, and patterns. In WordPress v6.2 its very easy for users to choose preset spacing for padding and margin, so fewer group styles related to those are needed.
* Added a new header menu dark template part and set header dark and header dark fixed to use it. This way those header menus will have a dark background to match the header background itself.
* Added link and hover color to the Site Title in theme.json (core/site-title) now that it doesn't default from the overall theme link and hover colors.
* Added button hover color to theme.json and removed the css from flat-blocks.css.
* Add Bullet style to latest posts and latest comments blocks since default is now plain (no bullets).
* Remove extra padding on sub-menus that have colored backgrounds.
* Remove custom border thin, normal, thick, and style and replace with hard-coded values. custom-border-color and custom-border-radius are still in place and used in the theme CSS
* Fix rounded image styles when global image style has a border radius.
* Add border to rounded profile pic (avatar) on testimonials pattern.
* Fix for center align on images now that WordPress uses the figure tag.
* Set Outline button padding to match regular buttons factoring in the outline button border width.
* Style the file download and search buttons to match other buttons
* Better support for users turning on link underlining. Added several blocks to theme.json to not display link underlines, such as Lists, Latest Posts, Latest Comments, etc. because it was just TOO much underlining.
* Added more image duotones. Turned off default WordPress duotones as the colors clash.
* Added more gradient colors.
* Add new custom variable to theme.json to control button drop-shadow (--wp--custom--button--shadow).
* Add new custom variable to theme.json for focus outline color (--wp--custom--outline--color).
* Set border radius on input fields, including text areas.
* Set outline (focus) to gray drop-shadow instead of the browser defaults.
* Inherit text color on colored backgrounds for when user defaults headings to a color.
* Added new global theme style for button drop-shadow and link underlines.
* Changed default theme style tertiary color to orange.
* Added light purple to the color palette and changed the purple theme style to use that one.
* Updated the global theme styles to have duotones that match each style's color scheme.

= 1.1 =
April 14, 2023

Updates for WordPress v6.1:
* Preset spacing sliders for padding and margins. These are based on the site gap (18px by default but can be overriden in the Global Styles Editor).
* Implemented the new more flexible WordPress comment blocks

= 1.0 =
March 10, 2023

Initial theme version

== Copyright ==

Flat Blocks WordPress Theme, (C) 2023 Tim Nicholson / XtremelySocial
Flat Blocks is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

This theme bundles the following third-party resources:

Lato font
Copyright (c) 2010-2014 by tyPoland Lukasz Dziedzic (team@latofonts.com) with Reserved Font Name "Lato"
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

Lora font
Copyright 2011 The Lora Project Authors (https://github.com/cyrealtype/Lora-Cyrillic), with Reserved Font Name "Lora".
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

Nunito font
Copyright 2014 The Nunito Project Authors (https://github.com/googlefonts/nunito)
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

Playfair Display font
Copyright 2017 The Playfair Display Project Authors (https://github.com/clauseggers/Playfair-Display), with Reserved Font Name "Playfair Display"
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

Raleway font
Copyright 2010 The Raleway Project Authors (impallari@gmail.com), with Reserved Font Name "Raleway".
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

Roboto font
Copyright Christian Robertson
This font is licensed under the Apache License, Version 2.0.
You can use them in your products & projects – print or digital, commercial or otherwise.

Roboto Mono font
Copyright Christian Robertson
This font is licensed under the Apache License, Version 2.0.
You can use them in your products & projects – print or digital, commercial or otherwise.

Source Sans Pro font
Copyright 2010, 2012, 2014 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name ‘Source’.
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

Source Serif Pro font
Copyright 2014 - 2021 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name 'Source'. All Rights Reserved. Source is a trademark of Adobe Systems Incorporated in the United States and/or other countries.
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is available with a FAQ at: http://scripts.sil.org/OFL

Style Script font
Copyright 2013 The Style Script Project Authors (https://github.com/googlefonts/style-script)
This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at: http://scripts.sil.org/OFL

Block Pattern Images:
All images from https://pexels.com licensed under the GPL, including modifications made for Flat Blocks to adjust image sizes.