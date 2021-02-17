<?php


namespace AIBVCS;


use AIBVCS\Enum\EnumWidgetSettings;
use AIBVCS\Settings\RankingWidgetSettings;
use AIBVCS\Settings\SettingsManager;
use AIBVCS\Settings\TournamentWidgetSettings;
use AIBVCS\Widget\RankingWidget;
use AIBVCS\Widget\TournamentWidget;
use AIBVCS\Widget\WidgetManager;
use Exception;

class Kernel
{

    /**
     * Initialize the Module, set up the plugin.
     * @throws Exception
     */
    public static function boot()
    {
        # autoload classes
        require __DIR__ . '/../vendor/autoload.php';

        # require callback functions, functions returning HTML, ecc...
        require __DIR__ . '/../includes/admin/admin-page-functions.php';
        require __DIR__ . '/../includes/admin/options/ranking-functions.php';
        require __DIR__ . '/../includes/admin/options/tournament-functions.php';
        require __DIR__ . '/../includes/widget/rankings-widget-functions.php';
        require __DIR__ . '/../includes/widget/tournament-widget-functions.php';

        # require module configuration
        $widgetDefaults = [];
        require __DIR__ . '/../aibvc-config.php';

        # register settings
        $sm = new SettingsManager();
        $sm->updateDefaults($widgetDefaults);
        $sm->addSetting(
            'rankings-widget', new RankingWidgetSettings($sm, $widgetDefaults[EnumWidgetSettings::WIDGET_RANKINGS_SETTINGS]));
        $sm->addSetting(
            'tournaments-widget', new TournamentWidgetSettings($sm, $widgetDefaults[EnumWidgetSettings::WIDGET_TOURNAMENTS_SETTINGS]));
        $sm->registerAll();

        # add widgets
        $wm = new WidgetManager($sm);
        $wm->addWidget('ranking', RankingWidget::class);
        $wm->addWidget('tournament', TournamentWidget::class);
        $wm->initWidgets();
    }
}