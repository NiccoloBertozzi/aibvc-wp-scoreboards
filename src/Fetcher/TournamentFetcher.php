<?php


namespace AIBVCS\Fetcher;


use AIBVCS\Entity\TournamentEntity;

class TournamentFetcher extends AbstractFetcher
{

    /**
     * @inheritDoc
     */
    public function fetch($params = null)
    {
        $date = $params['date'];
        if (empty($date))
        {
            $date = (new \DateTime('tomorrow + 12 months'))->format('Y-m-d');
            $params['date'] = $date;
        }

        $url = $this->resolveParameters($params);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type' => 'application/json',
        ]);

        $rawResponse = curl_exec($curl);
        curl_close($curl);

        $collection = json_decode($rawResponse, true);
        $tournaments = [];
        foreach ($collection as $entityData)
        {
            $tournamentEntity = (new TournamentEntity())
                ->buildFrom($entityData);

            $tournaments[] = $tournamentEntity;
        }

        return $tournaments;
    }
}