<?php
// Registor Theme option
function theme_settings_page() { ?>
  <div class="wrap">
    <h1><?php echo __('Theme options') ?></h1>
    <form method="post" action="options.php">
      <?php
        settings_fields("section");
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

// Display in dasboard
function display_theme_panel_fields() {
  add_settings_section("section", "All Settings", null, "theme-options");

  // Display Fields
  add_settings_field("text_field", "Text field", "display_text_element", "theme-options", "section");

  // Register setting
  register_setting("section", "text_field");
}
add_action("admin_init", "display_theme_panel_fields");
