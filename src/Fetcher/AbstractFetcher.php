<?php


namespace AIBVCS\Fetcher;


use AIBVCS\Model\IModel;

abstract class AbstractFetcher
{
    /**
     * API version to call.
     * @var int $apiVersion
     */
    protected $apiVersion;

    /**
     * Specific endpoint for this fetcher.
     * @var string $requestEndpoint
     */
    protected $requestEndpoint;

    /**
     * AbstractFetcher constructor.
     * @param int $apiVersion
     * @param string $requestEndpoint
     */
    public function __construct($apiVersion, $requestEndpoint)
    {
        if (!is_string($requestEndpoint))
            throw new \Exception('AbstractFetcher __construct($apiVersion, $requestEndpoint), $requestEndpoint must be a string', 1);
        if (!is_int($apiVersion))
            throw new \Exception('AbstractFetcher __construct($apiVersion, $requestEndpoint), $apiVersion must be an integer', 1);

        $this->apiVersion = $apiVersion;
        $this->requestEndpoint = $requestEndpoint;
    }

    /**
     * Check if the host is available.
     * @return bool
     */
    public function isAvailable()
    {
        # In debug mode I KNOW the API is available.
        if (AIBVCS_DEBUG_MODE)
            return true;

        $headers = get_headers(AIBVCS_API_URL);
        return $headers || array_key_exists('404', explode($headers[0]));
    }

    /**
     * Generates the full API url.
     * @return string
     */
    protected function generateUrl()
    {
        $fmt = '%s/api/v%s/%s';
        $url = sprintf($fmt, AIBVCS_API_URL, $this->apiVersion, $this->requestEndpoint);
        return $url;
    }

    /**
     * @param array $params
     * @return string|string[]|void
     */
    protected function resolveParameters($params)
    {
        # check if requestEndpoint contains named parameters
        if (strpos($this->requestEndpoint, '{') == false)
            return;

        # it has parameters, substitute them
        $endpoint = $this->generateUrl();
        foreach ($params as $paramId => $value)
        {
            if ($value == '')
                continue;

            $endpoint = str_replace(sprintf('{%s}', $paramId), $value, $endpoint);
        }

        return $endpoint;
    }

    /**
     * @return IModel
     */
    public abstract function fetch($params = null);

}