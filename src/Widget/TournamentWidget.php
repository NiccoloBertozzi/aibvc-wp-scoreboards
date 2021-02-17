<?php


namespace AIBVCS\Widget;


use AIBVCS\Fetcher\TournamentFetcher;

class TournamentWidget extends \WP_Widget implements IWidget
{
    public function __construct()
    {
        $args = [
            sprintf('%s_tournament', AIBVCS_MODULE_SLUG),
            'Lista tornei',
            [
                'classname'     =>  sprintf('%s-tournament-list', AIBVCS_MODULE_SLUG),
                'description'   =>  'Mostra una lista dei tornei.',
            ]
        ];
        parent::__construct(...$args);

        # set html callback
        add_action(
            sprintf('%s_tournament_widget_html', AIBVCS_MODULE_SLUG),
            sprintf('%s_tournament_widget_html_callback', AIBVCS_MODULE_SLUG),
            10,
            1
        );
    }

    /**
     * @inheritDoc
     */
    public function widget($args, $instance)
    {
        $tournamentData = get_transient(sprintf('%s_transient_tournamentData', AIBVCS_MODULE_SLUG));
        if (!$tournamentData)
        {
            $tournamentFetcher = new TournamentFetcher(1, 'tornei/GetTornei/{date}');
            $tournamentData = $tournamentFetcher->fetch([]);

            if ($tournamentData === false) {
                echo '<p>Critical Error on Server-Side, Scoreboards couldn\'t fetch Tournaments data from the APIs.</p>';
                return;
            }

            set_transient(sprintf('%s_transient_tournamentData', AIBVCS_MODULE_SLUG), $tournamentData, DAY_IN_SECONDS);
        }

        wp_enqueue_script(
            sprintf('%s-widgets-bundle', AIBVCS_MODULE_SLUG),
            plugins_url() . '/aibvc-wp-scoreboards/assets/js/dist/aibvcs-widgets.bundle.js'
        );

        # fire hooks
        do_action(sprintf('%s_tournament_widget_html', AIBVCS_MODULE_SLUG), $tournamentData);
    }

    /**
     * @inheritDoc
     */
    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    /**
     * @inheritDoc
     */
    public function form($instance)
    {
        echo '<p>Puoi controllare le impostazioni del widget visitando la pagina "Scoreboards" del back-office di wordpress.</p>';
    }
}