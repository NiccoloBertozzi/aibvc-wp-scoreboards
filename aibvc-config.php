<?php

defined('ABSPATH') || die('Access denied.');

use AIBVCS\Enum\SettingsFields\EnumRankingFields;

# General configuration
define('AIBVCS_PLUGIN_VERSION', '0.9.0');
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
/////////////////////////////////////////////////////////////////////////////////