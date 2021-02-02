<?php


namespace AIBVCS\Fetcher;


use AIBVCS\Entity\RankingAthleteEntity;
use AIBVCS\Model\IModel;
use AIBVCS\Model\RankingModel;

class RankingFetcher extends AbstractFetcher
{
    /**
     * @param mixed $params
     * @return false|array
     */
    public function fetch($params = null)
    {
        if (null === $params) return false;

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
        $athletes = [];
        foreach ($collection as $entityData)
        {
            $athleteEntity = (new RankingAthleteEntity())
                ->buildFrom($entityData);

            $athletes[] = $athleteEntity;
        }

        return $athletes;
    }
}