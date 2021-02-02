<?php

defined('ABSPATH') || die('Access denied.');

# settings page
function aibvcs_section_rankings_callback() {}

function aibvcs_section_rankings_field_max_elements_callback($args)
{
    $options = get_option(sprintf('%s_options', AIBVCS_MODULE_SLUG));
    $value = esc_attr($args['data-value']);
    if (isset($options[ $args['label_for'] ]))
        $value = esc_attr($options[ $args['label_for'] ]);

    ?>
    <input type="number" id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo sprintf('%s_options[%s]', AIBVCS_MODULE_SLUG, esc_attr($args['label_for'])) ?>"
           class="regular-text" value="<?php echo $value; ?>">
    <?php
}

function aibvcs_section_rankings_field_show_scores_callback($args)
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

function aibvcs_section_rankings_field_show_women_callback($args)
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

function aibvcs_section_rankings_field_shorten_surnames_callback($args)
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
