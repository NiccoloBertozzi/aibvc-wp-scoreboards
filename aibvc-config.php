<?php

defined('ABSPATH') || die('Access denied.');

use AIBVCS\Enum\SettingsFields\EnumRankingFields;
use AIBVCS\Enum\SettingsFields\EnumTournamentFields;

# General configuration
define('AIBVCS_PLUGIN_VERSION', '0.9.4');
define('AIBVCS_DEBUG_MODE', true);
define('AIBVCS_MODULE_SLUG', 'aibvcs');

# AIBVC API configuration.
define('AIBVCS_API_URL', 'http://aibvcapi.azurewebsites.net');

# Default settings

////////////////////////// WIDGET DEFAULT SETTINGS //////////////////////////////
$widgetDefaults = array();

$widgetDefaults[\AIBVCS\Enum\EnumWidgetSettings::WIDGET_RANKINGS_SETTINGS] = [
    EnumRankingFields::FIELD_MAX_ELEMENTS      =>  20,
    EnumRankingFields::FIELD_SHOW_SCORES       =>  true,
    EnumRankingFields::FIELD_SHOW_WOMEN        =>  false,
    EnumRankingFields::FIELD_SHORTEN_SURNAMES  =>  false,
];

$widgetDefaults[\AIBVCS\Enum\EnumWidgetSettings::WIDGET_TOURNAMENTS_SETTINGS] = [
    EnumTournamentFields::FIELD_SHOW_TITLE                  => true,
    EnumTournamentFields::FIELD_SHOW_TYPE                   => true,
    EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR     => true,
    EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR  => true,
    EnumTournamentFields::FIELD_SHOW_DIRECTOR               => true,
    EnumTournamentFields::FIELD_SHOW_FORMULE                => true,
    EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST      => true,
    EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS         => true,
    EnumTournamentFields::FIELD_SHOW_PRIZE                  => true,
    EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE => true,
    EnumTournamentFields::FIELD_SHOW_START_DATE             => true,
    EnumTournamentFields::FIELD_SHOW_END_DATE               => true,
    EnumTournamentFields::FIELD_SHOW_GENDER                 => true,
];
/////////////////////////////////////////////////////////////////////////////////