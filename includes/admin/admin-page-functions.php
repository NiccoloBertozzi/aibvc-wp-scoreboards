<?php

defined('ABSPATH') || die('Access denied.');

use AIBVCS\Enum\SettingsFields\EnumRankingFields;

function aibvcs_options_page_html()
{
    if ( !current_user_can( 'manage_options' ) )
        return;

    if ( isset( $_GET['settings-updated'] ) )
        add_settings_error( 'aibvcs_messages', 'aibvcs_message_update', __('Settings saved', 'aibvc-wp-scoreboards'), 'updated' );

    # output notices
    settings_errors( 'aibvc_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields(AIBVCS_MODULE_SLUG);
            do_settings_sections(AIBVCS_MODULE_SLUG);
            submit_button('Salva');
            ?>
        </form>
    </div>
    <?php
}

# called every time aibvcs' settings are saved
function aibvcs_options_update($options)
{
    # ranking settings
    if (!isset($options[EnumRankingFields::FIELD_SHOW_SCORES]) || $options[EnumRankingFields::FIELD_SHOW_SCORES] != true) {
        $options[EnumRankingFields::FIELD_SHOW_SCORES] = false;
    } else {
        $options[EnumRankingFields::FIELD_SHOW_SCORES] = true;
    }

    if (!isset($options[EnumRankingFields::FIELD_SHOW_WOMEN]) || $options[EnumRankingFields::FIELD_SHOW_WOMEN] != true) {
        $options[EnumRankingFields::FIELD_SHOW_WOMEN] = false;
    } else {
        $options[EnumRankingFields::FIELD_SHOW_WOMEN] = true;
    }

    if (!isset($options[EnumRankingFields::FIELD_SHORTEN_SURNAMES]) || $options[EnumRankingFields::FIELD_SHORTEN_SURNAMES] != true) {
        $options[EnumRankingFields::FIELD_SHORTEN_SURNAMES] = false;
    } else {
        $options[EnumRankingFields::FIELD_SHORTEN_SURNAMES] = true;
    }

    update_option(EnumRankingFields::FIELD_MAX_ELEMENTS, $options[EnumRankingFields::FIELD_MAX_ELEMENTS]);
    update_option(EnumRankingFields::FIELD_SHOW_SCORES, $options[EnumRankingFields::FIELD_SHOW_SCORES]);
    update_option(EnumRankingFields::FIELD_SHOW_WOMEN, $options[EnumRankingFields::FIELD_SHOW_WOMEN]);
    update_option(EnumRankingFields::FIELD_SHORTEN_SURNAMES, $options[EnumRankingFields::FIELD_SHORTEN_SURNAMES]);

    return $options;
}
