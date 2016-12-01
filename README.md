#Mindgrub Subtheme
This subtheme was created as a hackable boilerplate for Drupal 7 projects. It builds off the Bootstrap base theme, and includes improvements and common changes/tweaks.

In this theme, you will find:

* A pre-configured gulpfile that will compile your SCSS files and launch Browser Sync for live reload.
* A theme.info file configured to use Bootstrap SASS instead of the Bootstrap theme CSS files. 
* A base set of styles, including convenience mixins and fixes for common annoyances.
* Improved templates for regions, blocks, views and pages to make styling easier!

##Installation

1. Install the [Bootstrap theme](https://www.drupal.org/project/bootstrap).
2. Drop the Mindgrub subtheme in your sites/all/themes folder.
3. Change all instances of *mindgrub_subtheme* to your theme name.
4. Enable the theme and set it as the default theme. Disable the Bartik theme, if enabled.
5. Apply the front end vendor patch (https://www.drupal.org/node/2329453) to Drupal core: https://www.drupal.org/files/issues/ignore_front_end_vendor-2329453-111.patch.
6. ```cd``` into the theme directory and run ```npm install```.
7. In gulpfile.js, replace *mindgrub-subtheme.dev* with your domain.
8. Run gulp, and verify that live reload is working correctly by going to the designated URL (most likely http://localhost:3000).
9. Add the *Main menu* block to the *Navigation* region.

## Notes on Use

* The template.php folder should not have any extra code added.
* As usual, use the template folder for template overrides. Use the *inc* folder to include files that the Bootstrap theme does not automatically include.
* To include web fonts, use the WebFont loader when possible. See *templates/system/html.vars.php* for an example.
* Don't forget to change the favicon!  


## Notable Features

### Flexbox Header and Footer
Because the width of menus tends to be variable in nature, a static container width inevitably results in issues such as menu items breaking to a new line when more links are added to the menu. The header and footer regions use flexbox rather than Bootstrap columns in order to avoid this problem.

### Convenient CSS Classes
Several templates have been modified to introduce more convenient classes for styling to reduce the occurance of overly complicated CSS selectors.

#### Body
The \<body\> tag now includes classes for:

* Active and inactive template regions (e.g. ```.has-region-footer```, ```.no-region-sidebar-first```, etc.)
* If the page is a view page, the body will have a ```.view-page-[view-name]``` class.

#### Blocks
Blocks include a ```.block-region-[region]``` class and a ```.block-[delta]``` class.

#### Nodes
Nodes and other entities now have a ```.node-[node type]-[view mode]``` class, e.g. ```.node-article-teaser```, ```.node-article-full```, etc.

#### Views
Views now provide a ```.views-[view name]-[current display]``` class as well as a ```.views-display-[display plugin name]``` class.

### Bootstrap Grid Mixins
This theme abandons the use of Bootstrap column classes for page template regions, and instead creates the grid using both custom theme mixins as well as mixins provided by Bootstrap. This makes it easy to change the layout based on context. The ```_global.scss``` file, for example, uses the active region classes on the body tag to alter the layout accordingly:

```
.region-content {
  @include make-sm-column(12);
  .has-region-sidebar-first &,
  .has-region-sidebar-second & {
    @include make-md-column(9);
  }
  .has-region-sidebar-first.has-region-sidebar-second & {
    @include make-md-column(6);
  }
}
```

### Convenience Mixins
Other handy mixins come with this theme, such as breakpoint mixins, mixin-ified Bootstrap classes, and more!

### WYSIWYG Styles
A stylesheet for the WYSIWYG has been included, so the editor accurately displays how the content will appear.

### SVG Logo
The theme supports using a *logo.svg* instead of *logo.png* as a default logo.

### Fixes and Minor Improvements

* Fieldset styles have been adjusted to help fieldsets actually resemble a ```.panel```.
* AJAX spinners that appear inside a clickable component (buttons, pagers, etc.) will now be overlayed on the element instead of expanding its size.
* Font sizes have been converted to rems, and a px to rem converter function is provided.
* Fonts are now also extra pretty, with browser-appropriate font smoothing and the removal of awkward margins.
* The search form has been restyled to include a clickable search icon inside the text input.
* Pagination links are actually centered, even at small screen sizes.
* Reasonable default styles for the jQuery UI datepicker calendar.