<?php
function theme_settings_page(){
  ?>
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

function add_theme_menu_item(){
  add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");



function display_twitter_element()
{
  ?>
      <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
  ?>
      <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}


function logo_display()
{
  ?>
        <input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
        <input type="hidden" name="post_id" id="post_id" value="55" />
        <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
        <?php echo get_option('logo'); ?>
   <?php
}

function handle_logo_upload()
{
  if(!empty($_FILES["demo-file"]["tmp_name"]))
  {
    $urls = wp_handle_upload($_FILES["my_image_upload"], array('test_form' => FALSE));
      $temp = $urls["url"];
      return $temp;
  }

  return $option;
}

function display_theme_panel_fields()
{
  add_settings_section("section", "All Settings", null, "theme-options");

  add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
  add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
  add_settings_field("logo", "Logo", "logo_display", "theme-options", "section");

  register_setting("section", "twitter_url");
  register_setting("section", "facebook_url");
  register_setting("section", "logo", "handle_logo_upload");
}

add_action("admin_init", "display_theme_panel_fields");
