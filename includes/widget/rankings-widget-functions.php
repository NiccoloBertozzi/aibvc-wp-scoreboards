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

    ?>
    <section id="<?php echo sprintf('%s-ranking-widget', AIBVCS_MODULE_SLUG); ?>">
        <h2 class="widget-title" style="margin-bottom: 1rem">Classifica</h2>
    <?php
    $position = 1;
    foreach ($athletes as $athlete)
    {
        if ($position > $max_elements)
        {
            // ¯\_(ツ)_/¯
            continue;
        }
        if ($shorten_surnames)
        {
            $athlete->setSurname(sprintf('%s.', ($athlete->getSurname())[0]));
        }
        ?>
            <div class="ranking-athlete">
                <div class="position-circle">
                    <div class="circle"><?php echo $position; ?></div>
                </div>
                <div class="person-name-surname">
                    <p><?php echo sprintf('%s %s', $athlete->getName(), $athlete->getSurname()) ?></p>
                </div>
                <div class="position-score">
                    <?php if ($show_scores): ?>
                    <p><?php echo $athlete->getPoints(); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        $position++;
    }
    ?>
    </section>
    <?php
}
