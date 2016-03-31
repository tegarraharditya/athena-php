<?php

namespace Tests\Api\v1\pages;

class CityPage extends BasePage {

    /**
     * Retrieve single city details.
     *
     * @param int    $cityId      City to be retrieved identification
     * @param string $accessToken Request authentication token
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function getWithIdAction($cityId, $accessToken)
    {
        return $this->client()
            ->get(sprintf('/api/v1/cities/%s/?access_token=%s', $cityId, $accessToken))
            ->withOption('exceptions', FALSE)
            ->then()
            ->retrieve();
    }

    /**
     * Get a list of available cities.
     *
     * @param string $accessToken Request authentication token
     *
     * @return \Athena\Api\Response\ResponseFormatter
     */
    public function getAction($accessToken)
    {
        return $this->client()
            ->get('/api/v1/cities/?access_token=' . $accessToken)
            ->then()
            ->retrieve();
    }
    
}
