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

    }
}