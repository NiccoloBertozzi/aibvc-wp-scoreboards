<?php

defined('ABSPATH') || die('Access denied.');

# contains functions called when the RankingWidget
# fires it's hooks.

# widget html
function aibvcs_ranking_widget_html_callback($athletes)
{
    # TODO: Output data based on settings.
    ?>
    <section id="<?php echo sprintf('%s-ranking-widget', AIBVCS_MODULE_SLUG); ?>">
        <h2 class="widget-title" style="margin-bottom: 1rem">Classifica</h2>
    <?php
    $position = 1;
    foreach ($athletes as $athlete)
    {
        ?>
            <div class="ranking-athlete">
                <div class="position-circle">
                    <div class="circle"><?php echo $position; ?></div>
                </div>
                <div class="person-name-surname">
                    <p><?php echo sprintf('%s %s', $athlete->getName(), $athlete->getSurname()) ?></p>
                </div>
                <div class="position-score">
                    <p><?php echo $athlete->getPoints(); ?></p>
                </div>
            </div>
        <?php
        $position++;
    }
    ?>
    </section>
    <?php
}
