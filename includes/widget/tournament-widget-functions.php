<?php

defined('ABSPATH') || die('Access denied.');

# contains functions called when the TournamentWidget
# fires it's hooks.

# widget html
function aibvcs_tournament_widget_html_callback($tournaments)
{
    $tournamentTableHash = rand(1, getrandmax());
    $data = [];
    foreach ($tournaments as $tournament)
    {
        $data[] = [
            $tournament->getTitle() ?: '-',
            $tournament->getType() ?: '-',
            $tournament->getTournamentSupervisor() ?: '-',
            $tournament->getArbiterSupervisor() ?: '-',
            $tournament->getDirector() ?: '-',
            $tournament->getFormule() ?: '-',
            $tournament->getFacility() ?: '-',
            $tournament->getSubscriptionCost() ?: '-',
            $tournament->getVictoryPoints() ?: '-',
            $tournament->getPrize() ?: '-',
            $tournament->getSubscriptionsEndDate()->format('Y-m-d') ?: '-',
            $tournament->getStartDate()->format('Y-m-d') ?: '-',
            $tournament->getEndDate()->format('Y-m-d') ?: '-',
            $tournament->getGender() ?: '-'
        ];
    }

    ?>
    <section id="<?php echo sprintf('%s-tournament-widget', AIBVCS_MODULE_SLUG); ?>" class="tournament-wg-section-<?php echo $tournamentTableHash; ?>">
        <h2 class="widget-title" style="margin-bottom: 1rem">Lista Tornei</h2>
        <table class="tournament-widget-table display tournament-wg-<?php echo $tournamentTableHash; ?>">
            <thead>
            <th>Titolo</th>
            <th>Tipo</th>
            <th>Supervisore Torneo</th>
            <th>Supervisore Arbitrale</th>
            <th>Direttore</th>
            <th>Formula</th>
            <th>Impianto</th>
            <th>Quota Iscrizione</th>
            <th>Punti Vittoria</th>
            <th>Montepremi</th>
            <th>Chiusura Iscrizioni</th>
            <th>Data di inizio</th>
            <th>Data di fine</th>
            <th>Genere</th>
            </thead>
            <tbody aibvcs-table-data="<?php echo esc_attr(json_encode($data)); ?>">
            </tbody>
        </table>
        <style>.tournament-wg-section-<?php echo $tournamentTableHash; ?> {max-width: 70%;}.tournament-wg-section-<?php echo $tournamentTableHash; ?> .dataTables_wrapper {display: block;}.tournament-wg-section-<?php echo $tournamentTableHash; ?> * {margin: .2em;}.tournament-wg-section-<?php echo $tournamentTableHash; ?> .dataTables_filter label {display: flex;width: 100%;justify-content: center;align-items: center;display: block}.tournament-wg-section-<?php echo $tournamentTableHash; ?> .dataTables_filter label input[type="search"] {flex: 1;margin: 10px;}.tournament-wg-<?php echo $tournamentTableHash ?> {background-color: #ffffff;border: 0.2px solid #535353;margin-top: 15px;max-width: 100%;overflow-y: scroll;display: block}.tournament-wg-<?php echo $tournamentTableHash ?> tr:nth-child(2n) {background-color: #f8f8f8;}.tournament-wg-<?php echo $tournamentTableHash ?> .dataTables_paginate a {margin: 5px;}</style>
    </section>
    <?php

}
