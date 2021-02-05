<?php


namespace AIBVCS\Entity;


use Cassandra\Date;

class TournamentEntity implements IEntity
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $arbiterSupervisor;

    /**
     * @var string
     */
    private $tournamentSupervisor;

    /**
     * @var string
     */
    private $director;

    /**
     * @var string
     */
    private $formule;

    /**
     * @var float
     */
    private $subscriptionCost;

    /**
     * @var float
     */
    private $victoryPoints;

    /**
     * @var float
     */
    private $prize;

    /**
     * @var \DateTime
     */
    private $subscriptionsEndDate;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $gender;

    /**
     * TournamentEntity constructor.
     * @param string $title
     * @param string $type
     * @param string $arbiterSupervisor
     * @param string $tournamentSupervisor
     * @param string $director
     * @param string $formule
     * @param float $subscriptionCost
     * @param float $victoryPoints
     * @param float $prize
     * @param \DateTime $subscriptionsEndDate
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $gender
     */
    public function __construct($title, $type, $arbiterSupervisor, $tournamentSupervisor, $director, $formule, $subscriptionCost, $victoryPoints, $prize, \DateTime $subscriptionsEndDate, \DateTime $startDate, \DateTime $endDate, $gender)
    {
        $this->title = $title;
        $this->type = $type;
        $this->arbiterSupervisor = $arbiterSupervisor;
        $this->tournamentSupervisor = $tournamentSupervisor;
        $this->director = $director;
        $this->formule = $formule;
        $this->subscriptionCost = $subscriptionCost;
        $this->victoryPoints = $victoryPoints;
        $this->prize = $prize;
        $this->subscriptionsEndDate = $subscriptionsEndDate;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->gender = $gender;
    }

    /**
     * @inheritDoc
     */
    public function buildFrom($data)
    {
        $title                  = isset($data['titolo']) ? esc_attr($data['titolo']) : '';
        $type                   = isset($data['tipoTorneo']) ? esc_attr($data['tipoTorneo']) : '';
        $arbiterSupervisor      = isset($data['supervisoreTorneo']) ? esc_attr($data['supervisoreTorneo']) : '';
        $tournamentSupervisor   = isset($data['supervisoreArbitrale']) ? esc_attr($data['supervisoreArbitrale']) : '';
        $director               = isset($data['direttoreCompetizione']) ? esc_attr($data['direttoreCompetizione']) : '';
        $formule                = isset($data['formula']) ? esc_attr($data['formula']) : '';
        $subscriptionCost       = isset($data['quotaIscrizione']) ? floatval(esc_attr($data['quotaIscrizione'])) : 0.0;
        $victoryPoints          = isset($data['puntiVittoria']) ? floatval(esc_attr($data['puntiVittoria'])) : 0.0;
        $prize                  = isset($data['montepremi']) ? floatval(esc_attr($data['montepremi'])) : 0.0;
        $subscriptionsEndDate   = isset($data['dataChiusuraIscrizioni']) ? new \DateTime(esc_attr($data['dataChiusuraIscrizioni'])) : (new \DateTime('now'));
        $startDate              = isset($data['dataInizio']) ? new \DateTime(esc_attr($data['dataInizio'])) : (new \DateTime('now'));
        $endDate                = isset($data['dataFine']) ? new \DateTime(esc_attr($data['dataFine'])) : (new \DateTime('now'));
        $gender                 = isset($data['gender']) ? esc_attr($data['gender']) : '';

        $this->title = $title;
        $this->type = $type;
        $this->arbiterSupervisor = $arbiterSupervisor;
        $this->tournamentSupervisor = $tournamentSupervisor;
        $this->director = $director;
        $this->formule = $formule;
        $this->subscriptionCost = $subscriptionCost;
        $this->victoryPoints = $victoryPoints;
        $this->prize = $prize;
        $this->subscriptionsEndDate = $subscriptionsEndDate;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return TournamentEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return TournamentEntity
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArbiterSupervisor()
    {
        return $this->arbiterSupervisor;
    }

    /**
     * @param mixed $arbiterSupervisor
     * @return TournamentEntity
     */
    public function setArbiterSupervisor($arbiterSupervisor)
    {
        $this->arbiterSupervisor = $arbiterSupervisor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTournamentSupervisor()
    {
        return $this->tournamentSupervisor;
    }

    /**
     * @param mixed $tournamentSupervisor
     * @return TournamentEntity
     */
    public function setTournamentSupervisor($tournamentSupervisor)
    {
        $this->tournamentSupervisor = $tournamentSupervisor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     * @return TournamentEntity
     */
    public function setDirector($director)
    {
        $this->director = $director;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormule()
    {
        return $this->formule;
    }

    /**
     * @param mixed $formule
     * @return TournamentEntity
     */
    public function setFormule($formule)
    {
        $this->formule = $formule;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionCost()
    {
        return $this->subscriptionCost;
    }

    /**
     * @param mixed $subscriptionCost
     * @return TournamentEntity
     */
    public function setSubscriptionCost($subscriptionCost)
    {
        $this->subscriptionCost = $subscriptionCost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVictoryPoints()
    {
        return $this->victoryPoints;
    }

    /**
     * @param mixed $victoryPoints
     * @return TournamentEntity
     */
    public function setVictoryPoints($victoryPoints)
    {
        $this->victoryPoints = $victoryPoints;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * @param mixed $prize
     * @return TournamentEntity
     */
    public function setPrize($prize)
    {
        $this->prize = $prize;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionsEndDate()
    {
        return $this->subscriptionsEndDate;
    }

    /**
     * @param mixed $subscriptionsEndDate
     * @return TournamentEntity
     */
    public function setSubscriptionsEndDate($subscriptionsEndDate)
    {
        $this->subscriptionsEndDate = $subscriptionsEndDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     * @return TournamentEntity
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     * @return TournamentEntity
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return TournamentEntity
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

}