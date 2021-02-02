<?php


namespace AIBVCS\Settings;

use AIBVCS\Enum\SettingsFields\EnumRankingFields;
use AIBVCS\Settings\SettingsManager;

class RankingWidgetSettings extends AbstractSettings
{
    private $titles = [
        EnumRankingFields::FIELD_MAX_ELEMENTS      => 'Numero massimo di elementi',
        EnumRankingFields::FIELD_SHOW_SCORES       => 'Mostra punteggi atleti',
        EnumRankingFields::FIELD_SHOW_WOMEN        => 'Mostra anche le donne',
        EnumRankingFields::FIELD_SHORTEN_SURNAMES  => 'Accorcia i cognomi',
    ];

    public function __construct(\AIBVCS\Settings\SettingsManager $sm, $defaults)
    {
        parent::__construct($sm, $defaults);

        $this->setSection('rankings');
    }

    /**
     * Register specific options for a section.
     * @return mixed
     */
    public function hooks() {}

    /**
     * @param string $sectionId
     * @return mixed
     */
    public function fields($sectionId)
    {
        $sm = $this->getManager();
        $defaults = $this->defaults;
        $titles = $this->titles;

        $slug = $sm->getSlug();

        add_action('admin_init', function () use ($sectionId, $defaults, $titles, $slug)
        {
            # max elements
            add_settings_field(
                EnumRankingFields::FIELD_MAX_ELEMENTS,
                $titles[EnumRankingFields::FIELD_MAX_ELEMENTS],
                sprintf('%s_field_%s_callback', $sectionId, EnumRankingFields::FIELD_MAX_ELEMENTS),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumRankingFields::FIELD_MAX_ELEMENTS,
                    'data-value'    =>  $defaults[EnumRankingFields::FIELD_MAX_ELEMENTS],
                ]
            );
            # show scores
            add_settings_field(
                EnumRankingFields::FIELD_SHOW_SCORES,
                $titles[EnumRankingFields::FIELD_SHOW_SCORES],
                sprintf('%s_field_%s_callback', $sectionId, EnumRankingFields::FIELD_SHOW_SCORES),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumRankingFields::FIELD_SHOW_SCORES,
                    'data-value'    =>  $defaults[EnumRankingFields::FIELD_SHOW_SCORES],
                ]
            );
            # show women
            add_settings_field(
                EnumRankingFields::FIELD_SHOW_WOMEN,
                $titles[EnumRankingFields::FIELD_SHOW_WOMEN],
                sprintf('%s_field_%s_callback', $sectionId, EnumRankingFields::FIELD_SHOW_WOMEN),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumRankingFields::FIELD_SHOW_WOMEN,
                    'data-value'    =>  $defaults[EnumRankingFields::FIELD_SHOW_WOMEN],
                ]
            );
            # shorten surnames
            add_settings_field(
                EnumRankingFields::FIELD_SHORTEN_SURNAMES,
                $titles[EnumRankingFields::FIELD_SHORTEN_SURNAMES],
                sprintf('%s_field_%s_callback', $sectionId, EnumRankingFields::FIELD_SHORTEN_SURNAMES),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumRankingFields::FIELD_SHORTEN_SURNAMES,
                    'data-value'    =>  $defaults[EnumRankingFields::FIELD_SHORTEN_SURNAMES],
                ]
            );
        });
    }


}