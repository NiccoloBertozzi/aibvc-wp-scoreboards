<?php

defined('ABSPATH') || die('Access denied.');

# settings page
function aibvcs_section_tournaments_callback() {}

# TODO: Fix code duplications

function aibvcs_section_tournaments_field_aibvcs_tournament_show_title_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_type_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_arbiter_supervisor_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_tournament_supervisor_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_director_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_formule_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_subscription_cost_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_victory_points_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_prize_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_subscriptions_end_date_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_start_date_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_end_date_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}

function aibvcs_section_tournaments_field_aibvcs_tournament_show_gender_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr(($args['data-value']));
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           value="1" <?php checked( $value ) ?>>
    <?php
}
