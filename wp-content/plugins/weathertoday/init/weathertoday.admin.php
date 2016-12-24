<?php
/**
 * Admin settings page.
 */

class WeatherTodaySettingsPage {
  /**
  * Holds the values to be used in the fields callbacks
  */
  private $options;

  /**
  * Start up
  */
  public function __construct() {
    add_action('admin_menu', array($this, 'add_plugin_page' ));
    add_action('admin_init', array($this, 'page_init'));
  }

  /**
  * Add options page
  */
  public function add_plugin_page() {
    // This page will be under "Settings"
    add_options_page(
      __('Weather Settings'),
      __('Weather'),
      'manage_options',
      'weather-setting-admin',
      array($this, 'create_admin_page')
    );
  }

  /**
  * Options page callback
  */
  public function create_admin_page() {
    // Set class property
    $this->options = get_option('weather_board_settings');

    ?>
    <div class="wrap">
      <h1>Weather Today Plugin settings</h1>
      <form method="post" action="options.php">
      <?php
        // This prints out all hidden setting fields
        settings_fields('weather_option_config');
        do_settings_sections('weather-setting-admin');
        submit_button();
      ?>
      </form>
    </div>
    <?php
  }

  /**
  * Register and add settings
  */
  public function page_init() {
    register_setting('weather_option_config', 'weather_board_settings');

    // Facebook Account
    add_settings_section(
      'weather_section_id', // ID
      '', // Title
      array( $this, 'print_section_info' ), // Callback
      'weather-setting-admin' // Page
    );

    add_settings_field(
      'weather_api_key',
      __('Weather API Key'),
      array( $this, 'form_textfield' ), // Callback
      'weather-setting-admin', // Page
      'weather_section_id',
      'weather_api_key'
    );
  }

  /**
  * Print the Section text
  */
  public function print_section_info() {
    //echo "Configure to your Social account.";
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_textfield($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<input type="text" size=60 id="form-id-%s" name="weather_board_settings[%s]" value="%s" />', $name, $name, $value);
  }
}