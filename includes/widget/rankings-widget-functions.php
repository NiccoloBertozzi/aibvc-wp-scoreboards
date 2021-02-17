<?php

defined('ABSPATH') || die('Access denied.');

use AIBVCS\Enum\SettingsFields\EnumRankingFields;

# contains functions called when the RankingWidget
# fires it's hooks.

# widget html
function aibvcs_ranking_widget_html_callback($athletes)
{
    # get options
    $max_elements = get_option(EnumRankingFields::FIELD_MAX_ELEMENTS);
    $show_scores = get_option(EnumRankingFields::FIELD_SHOW_SCORES);
    $shorten_surnames = get_option(EnumRankingFields::FIELD_SHORTEN_SURNAMES);
    $rankingTableHash = rand(1, getrandmax());

    $data = [];
    $pos = 1;
    foreach ($athletes as $athlete)
    {
        if ($pos > $max_elements)
        {
            continue;
        }
        $data[] = [
            $pos,
            $shorten_surnames ? sprintf('%s %s.', $athlete->getName(),($athlete->getSurname())[0]) : sprintf('%s %s', $athlete->getName(), $athlete->getSurname()),
            $show_scores ? $athlete->getPoints() : 0
        ];
        if ($pos == 1) { $data[$pos-1][2] .= " 🥇"; }
        if ($pos == 2) { $data[$pos-1][2] .= " 🥈"; }
        if ($pos == 3) { $data[$pos-1][2] .= " 🥉"; }
        $pos++;
    }

    ?>
    <section id="<?php echo sprintf('%s-ranking-widget', AIBVCS_MODULE_SLUG); ?>" class="ranking-wg-section-<?php echo $rankingTableHash; ?>">
        <h2 class="widget-title" style="margin-bottom: 1rem">Classifica</h2>
        <table class="ranking-widget-table display ranking-wg-<?php echo $rankingTableHash; ?>">
            <thead>
                <th>Posizione</th>
                <th>Nome</th>
                <th>Punteggio</th>
            </thead>
            <tbody aibvcs-table-data="<?php echo esc_attr(json_encode($data)); ?>">
            </tbody>
        </table>
        <style>.ranking-wg-section-<?php echo $rankingTableHash; ?> * {margin: .2em;}.ranking-wg-section-<?php echo $rankingTableHash; ?> .dataTables_filter label {display: flex;width: 100%;justify-content: center;align-items: center;}.ranking-wg-section-<?php echo $rankingTableHash; ?> .dataTables_filter label input[type="search"] {flex: 1;margin: 10px;}.ranking-wg-<?php echo $rankingTableHash ?> {background-color: #ffffff;border: 0.2px solid #535353;margin-top: 15px;}.ranking-wg-<?php echo $rankingTableHash ?> tr:nth-child(2n) {background-color: #f8f8f8;}.ranking-wg-<?php echo $rankingTableHash ?> .dataTables_paginate a {margin: 5px;}</style>
    </section>
    <?php
}
