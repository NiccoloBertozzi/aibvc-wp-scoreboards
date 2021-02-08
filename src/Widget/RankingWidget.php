<?php


namespace AIBVCS\Widget;

use AIBVCS\Enum\SettingsFields\EnumRankingFields;
use AIBVCS\Fetcher\RankingFetcher;
use AIBVCS\Settings\SettingsManager;

/**
 * Class RankingWidget
 * @package AIBVCS\Widget
 */
class RankingWidget extends \WP_Widget implements IWidget
{

    /**
     * RankingWidget constructor.
     */
    public function __construct()
    {
        $args = [
            sprintf('%s_ranking', AIBVCS_MODULE_SLUG),
            'Classifica atleti',
            [
                'classname'     =>  sprintf('%s-ranking-list', AIBVCS_MODULE_SLUG),
                'description'   =>  'Mostra una lista con la classifica degli atleti.',
            ]
        ];
        parent::__construct(...$args);

        # set html callback
        add_action(
            sprintf('%s_ranking_widget_html', AIBVCS_MODULE_SLUG),
            sprintf('%s_ranking_widget_html_callback', AIBVCS_MODULE_SLUG),
            10,
            1
        );
    }

    /**
     * Echoes the widget content.
     *
     * Subclasses should override this function to generate their widget code.
     *
     * @param array $args Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance The settings for the particular instance of the widget.
     * @since 2.8.0
     *
     */
    public function widget($args, $instance)
    {
        $rankingData = [];
        $show_women = get_option(EnumRankingFields::FIELD_SHOW_WOMEN);
        if ($show_women)
        {
            # check if a transient already has the recent athletes.
            $rankingData = get_transient(sprintf('%s_transient_rankingData_female', AIBVCS_MODULE_SLUG));
            if (!$rankingData)
            {
                $rankingFetcher = new RankingFetcher(1, '/gestionale/GetClassifica/{S}');
                $rankingData = $rankingFetcher->fetch([
                    'S' =>  'F' # sesso
                ]);

                if ($rankingData === false) {
                    echo '<p>Critical Error on Server-Side, Scoreboards couldn\'t fetch Ranking data from the APIs.</p>';
                    return;
                }

                set_transient(sprintf('%s_transient_rankingData_female', AIBVCS_MODULE_SLUG), $rankingData, DAY_IN_SECONDS);
            }
        } else {
            # check if a transient already has the recent athletes.
            $rankingData = get_transient(sprintf('%s_transient_rankingData_male', AIBVCS_MODULE_SLUG));
            if (!$rankingData)
            {
                $rankingFetcher = new RankingFetcher(1, '/gestionale/GetClassifica/{S}');
                $rankingData = $rankingFetcher->fetch([
                    'S' =>  'M' # sesso
                ]);

                if ($rankingData === false) {
                    echo '<p>Critical Error on Server-Side, Scoreboards couldn\'t fetch Ranking data from the APIs.</p>';
                    return;
                }

                set_transient(sprintf('%s_transient_rankingData_male', AIBVCS_MODULE_SLUG), $rankingData, DAY_IN_SECONDS);
            }
        }

        wp_enqueue_style(
            sprintf('%s-widget-ranking', AIBVCS_MODULE_SLUG),
            plugins_url() . '/aibvc-wp-scoreboards/assets/css/widget-ranking.css', [], false
        );

        # fire hooks
        do_action(sprintf('%s_ranking_widget_html', AIBVCS_MODULE_SLUG), $rankingData);
    }

    /**
     * Updates a particular instance of a widget.
     *
     * This function should check that `$new_instance` is set correctly. The newly-calculated
     * value of `$instance` should be returned. If false is returned, the instance won't be
     * saved/updated.
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     * @since 2.8.0
     *
     */
    public function update($new_instance, $old_instance)
    {
        # the widget has settings on a custom page
    }

    /**
     * Outputs the settings update form.
     *
     * @param array $instance Current settings.
     * @return string Default return is 'noform'.
     * @since 2.8.0
     *
     */
    public function form($instance)
    {
        echo '<p>Puoi controllare le impostazioni del widget visitando la pagina "Scoreboards" del back-office di wordpress.</p>';
    }

}