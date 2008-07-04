=== ul-title ===
Contributors: johnl1479
Donate link: http://johnluetke.net/ul-title
Tags: formatting, title 
Requires at least: 2.3.0
Tested up to: 2.5.1
Stable tag: 1.1

ul-title creates a new template tag called wp_ul_title that returns wp_title as an hierarchical unordered list (ul).

== Description ==

ul-title creates a new template tag called wp_ul_title that returns wp_title as an hierarchical unordered list (ul).

== Installation ==

To install ul-title, follow the same basic procedures as you would for any other Wordpress plugin

1. Upload `ul-title.php` to `wp-content/plugins/` directory. Optionally, you can create a folder called `ul-title` and place `ul-title.php` within this folder.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php wp_title_ul ( $params ); ?>` in your template file

== Usage ==

ul-title takes 2 parameters. They must be specified in the order below.

- `sep` (optional) Specify a separator for elements of the title. The default is `&raquo;`

- `display` (optional) Whether or not to print the list or return it. `true`  will print it it, `false` with return it. The default is true.
