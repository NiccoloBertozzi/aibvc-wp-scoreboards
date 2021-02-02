<?php


namespace AIBVCS\Entity;


class RankingAthleteEntity implements IEntity
{
    # Athlete's name
    private $name;

    # Athlete's surname
    private $surname;

    # Athlete's ranking points
    private $points;

    /**
     * RankingAthleteEntity constructor.
     * @param string $name
     * @param string $surname
     * @param double $points
     */
    public function __construct($name = '', $surname = '', $points = 0.0)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->points = $points;

        return $this;
    }

    /**
     * Build entity from data.
     * @param array $data
     * @return IEntity
     */
    public function buildFrom($data)
    {
        $name = '';
        $surname = '';
        $points = 0;

        if (isset($data['nome']))
            $name = esc_attr($data['nome']);
        if (isset($data['cognome']))
            $surname = esc_attr($data['cognome']);
        if (isset($data['punteggi']))
            $points = intval(esc_attr($data['punteggi']));

        $this->name = $name;
        $this->surname = $surname;
        $this->points = $points;

        return $this;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return RankingAthleteEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     * @return RankingAthleteEntity
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     * @return RankingAthleteEntity
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

}