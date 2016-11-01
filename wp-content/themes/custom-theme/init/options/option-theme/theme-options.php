<?php
// Registor Theme option
function theme_settings_page() { ?>
  <div class="wrap">
    <h1><?php echo __('Theme options') ?></h1>
    <form method="post" action="options.php">
      <?php
        settings_fields("theme-setting");
        do_settings_sections("theme-options");
        submit_button();
      ?>
    </form>
  </div>
<?php
}

// Add Item to Admin menu
function add_theme_menu_item() {
  add_submenu_page(
    "themes.php",
    "Theme Settings",
    "Theme Settings",
    "manage_options",
    "theme-panel",
    "theme_settings_page",
    null,
    99
  );
}
add_action("admin_menu", "add_theme_menu_item");

// Display in dasboard
function display_theme_panel_fields() {
  // Add Section
  add_settings_section("theme-setting", "Theme Setting", null, "theme-options");

  // Display Fields
  add_settings_field(
    "text_field", 
    "Text field", 
    "display_text_element", 
    "theme-options", 
    "theme-setting"
  );

  // Display Fields
  add_settings_field(
    "upload_field", 
    "Upload field", 
    "display_upload_element", 
    "theme-options", 
    "theme-setting"
  );

  // Register setting
  register_setting("theme-setting", "text_field");
  register_setting("theme-setting", "upload_field");
}
add_action("admin_init", "display_theme_panel_fields");

/*
 *
 *
 * Fields for Theme Option
 *
 *
 */

// Text Field
function display_text_element() { ?>
  <input type="text" name="text_field" value="<?php echo get_option('text_field'); ?>" />
<?php
}

// Upload Field
function display_upload_element() { 
  if(function_exists( 'wp_enqueue_media' )){
  wp_enqueue_media();
  } else {
      wp_enqueue_style('thickbox');
      wp_enqueue_script('media-upload');
      wp_enqueue_script('thickbox');
  }
  ?>
  <div class="upload_demo"><img class="thumbnail_image" src="<?php echo get_option('upload_field'); ?>" width="150"/></div>
  <div class="upload_url"><input class="value_image" type="text" name="upload_field" value="<?php echo get_option('upload_field'); ?>" /></div>
  <div><a href="#" class="upload_image">Upload</a> <a href="#" class="remove_image">Remove</a></div>
<?php
  media_upload();
}
