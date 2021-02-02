<?php


namespace AIBVCS;


use AIBVCS\Enum\EnumWidgetSettings;
use AIBVCS\Settings\RankingWidgetSettings;
use AIBVCS\Settings\SettingsManager;
use AIBVCS\Widget\RankingWidget;
use AIBVCS\Widget\WidgetManager;

class Kernel
{

    /**
     * Initialize the Module, set up the plugin.
     */
    public static function boot()
    {
        # autoload classes
        require __DIR__ . '/../vendor/autoload.php';

        # require callback functions, functions returning HTML, ecc...
        require __DIR__ . '/../includes/admin/admin-page-functions.php';
        require __DIR__ . '/../includes/admin/options/ranking-functions.php';
        require __DIR__ . '/../includes/widget/rankings-widget-functions.php';

        # require module configuration
        require __DIR__ . '/../aibvc-config.php';

        # register settings
        $sm = new SettingsManager();
        $sm->addSetting(
            'rankings-widget', new RankingWidgetSettings($sm, $widgetDefaults[EnumWidgetSettings::WIDGET_RANKINGS_SETTINGS]));
        $sm->registerAll();

        # add widgets
        $wm = new WidgetManager($sm);
        $wm->addWidget('ranking', RankingWidget::class);
        $wm->initWidgets();
    }
}