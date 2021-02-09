<?php

defined('ABSPATH') || die('Access denied.');

use AIBVCS\Enum\SettingsFields\EnumRankingFields;
use AIBVCS\Enum\SettingsFields\EnumTournamentFields;

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

    # tournament settings
    if (!isset($options[EnumTournamentFields::FIELD_SHOW_TITLE]) || $options[EnumTournamentFields::FIELD_SHOW_TITLE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_TITLE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_TITLE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_TYPE]) || $options[EnumTournamentFields::FIELD_SHOW_TYPE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_TYPE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_TITLE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR]) || $options[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR]) || $options[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_DIRECTOR]) || $options[EnumTournamentFields::FIELD_SHOW_DIRECTOR] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_DIRECTOR] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_DIRECTOR] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_FORMULE]) || $options[EnumTournamentFields::FIELD_SHOW_FORMULE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_FORMULE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_FORMULE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST]) || $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS]) || $options[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_PRIZE]) || $options[EnumTournamentFields::FIELD_SHOW_PRIZE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_PRIZE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_PRIZE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE]) || $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_START_DATE]) || $options[EnumTournamentFields::FIELD_SHOW_START_DATE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_START_DATE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_START_DATE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_END_DATE]) || $options[EnumTournamentFields::FIELD_SHOW_END_DATE] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_END_DATE] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_END_DATE] = true;
    }

    if (!isset($options[EnumTournamentFields::FIELD_SHOW_GENDER]) || $options[EnumTournamentFields::FIELD_SHOW_GENDER] != true) {
        $options[EnumTournamentFields::FIELD_SHOW_GENDER] = false;
    } else {
        $options[EnumTournamentFields::FIELD_SHOW_GENDER] = true;
    }

    update_option(EnumRankingFields::FIELD_MAX_ELEMENTS, $options[EnumRankingFields::FIELD_MAX_ELEMENTS]);
    update_option(EnumRankingFields::FIELD_SHOW_SCORES, $options[EnumRankingFields::FIELD_SHOW_SCORES]);
    update_option(EnumRankingFields::FIELD_SHOW_WOMEN, $options[EnumRankingFields::FIELD_SHOW_WOMEN]);
    update_option(EnumRankingFields::FIELD_SHORTEN_SURNAMES, $options[EnumRankingFields::FIELD_SHORTEN_SURNAMES]);
    update_option(EnumTournamentFields::FIELD_SHOW_TITLE, $options[EnumTournamentFields::FIELD_SHOW_TITLE]);
    update_option(EnumTournamentFields::FIELD_SHOW_TYPE, $options[EnumTournamentFields::FIELD_SHOW_TYPE]);
    update_option(EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR, $options[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR]);
    update_option(EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR, $options[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR]);
    update_option(EnumTournamentFields::FIELD_SHOW_DIRECTOR, $options[EnumTournamentFields::FIELD_SHOW_DIRECTOR]);
    update_option(EnumTournamentFields::FIELD_SHOW_FORMULE, $options[EnumTournamentFields::FIELD_SHOW_FORMULE]);
    update_option(EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST, $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST]);
    update_option(EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS, $options[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS]);
    update_option(EnumTournamentFields::FIELD_SHOW_PRIZE, $options[EnumTournamentFields::FIELD_SHOW_PRIZE]);
    update_option(EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE, $options[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE]);
    update_option(EnumTournamentFields::FIELD_SHOW_START_DATE, $options[EnumTournamentFields::FIELD_SHOW_START_DATE]);
    update_option(EnumTournamentFields::FIELD_SHOW_END_DATE, $options[EnumTournamentFields::FIELD_SHOW_END_DATE]);
    update_option(EnumTournamentFields::FIELD_SHOW_GENDER, $options[EnumTournamentFields::FIELD_SHOW_GENDER]);

    return $options;
}
