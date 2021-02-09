<?php


namespace AIBVCS\Settings;


use AIBVCS\Enum\SettingsFields\EnumTournamentFields;

class TournamentWidgetSettings extends AbstractSettings
{
    private $titles = [
        EnumTournamentFields::FIELD_SHOW_TITLE                  => 'Mostra il titolo del torneo.',
        EnumTournamentFields::FIELD_SHOW_TYPE                   => 'Mostra il tipo di torneo',
        EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR     => 'Rendi visibile il supervisore arbitro',
        EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR  => 'Rendi visibile il supervisore del torneo',
        EnumTournamentFields::FIELD_SHOW_DIRECTOR               => 'Mostra direttore',
        EnumTournamentFields::FIELD_SHOW_FORMULE                => 'Mostra formula',
        EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST      => 'Mostra il costo di iscrizione',
        EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS         => 'Mostra i punti vittoria',
        EnumTournamentFields::FIELD_SHOW_PRIZE                  => 'Mostra il montepremi',
        EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE => 'Mostra la data di fine delle iscrizioni',
        EnumTournamentFields::FIELD_SHOW_START_DATE             => 'Rendi visibile la data di inizio del torneo',
        EnumTournamentFields::FIELD_SHOW_END_DATE               => 'Rendi visibile la data di fine del torneo',
        EnumTournamentFields::FIELD_SHOW_GENDER                 => 'Mostra il sesso'
    ];

    public function __construct(\AIBVCS\Settings\SettingsManager $sm, $defaults)
    {
        parent::__construct($sm, $defaults);

        $this->setSection('tournaments');
    }

    /**
     * @inheritDoc
     */
    public function hooks() {}

    /**
     * @inheritDoc
     */
    public function fields($sectionId)
    {
        $sm = $this->getManager();
        $defaults = $this->defaults;
        $titles = $this->titles;

        $slug = $sm->getSlug();

        add_action('admin_init', function () use ($sectionId, $defaults, $titles, $slug) {
            # show titles
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_TITLE,
                $titles[EnumTournamentFields::FIELD_SHOW_TITLE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_TITLE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_TITLE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_TITLE],
                ]
            );
            # show types
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_TYPE,
                $titles[EnumTournamentFields::FIELD_SHOW_TYPE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_TYPE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_TYPE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_TYPE],
                ]
            );
            # show arbiter supervisors
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR,
                $titles[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_ARBITER_SUPERVISOR],
                ]
            );
            # show tournament supervisors
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR,
                $titles[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_TOURNAMENT_SUPERVISOR],
                ]
            );
            # show director
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_DIRECTOR,
                $titles[EnumTournamentFields::FIELD_SHOW_DIRECTOR],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_DIRECTOR),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_DIRECTOR,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_DIRECTOR],
                ]
            );
            # show formules
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_FORMULE,
                $titles[EnumTournamentFields::FIELD_SHOW_FORMULE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_FORMULE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_FORMULE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_FORMULE],
                ]
            );
            # show subscription costs
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST,
                $titles[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTION_COST],
                ]
            );
            # show victory points
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS,
                $titles[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_VICTORY_POINTS],
                ]
            );
            # show prizes
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_PRIZE,
                $titles[EnumTournamentFields::FIELD_SHOW_PRIZE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_PRIZE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_PRIZE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_PRIZE],
                ]
            );
            # show subscription end dates
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE,
                $titles[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_SUBSCRIPTIONS_END_DATE],
                ]
            );
            # show tournament start dates
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_START_DATE,
                $titles[EnumTournamentFields::FIELD_SHOW_START_DATE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_START_DATE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_START_DATE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_START_DATE],
                ]
            );
            # show tournament end dates
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_END_DATE,
                $titles[EnumTournamentFields::FIELD_SHOW_END_DATE],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_END_DATE),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_END_DATE,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_END_DATE],
                ]
            );
            # show gender
            add_settings_field(
                EnumTournamentFields::FIELD_SHOW_GENDER,
                $titles[EnumTournamentFields::FIELD_SHOW_GENDER],
                sprintf('%s_field_%s_callback', $sectionId, EnumTournamentFields::FIELD_SHOW_GENDER),
                $slug,
                $sectionId,
                [
                    'label_for'     =>  EnumTournamentFields::FIELD_SHOW_GENDER,
                    'data-value'    =>  $defaults[EnumTournamentFields::FIELD_SHOW_GENDER],
                ]
            );
        });
    }
}