<?php

namespace Tests\Api\open\pages;

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
            ->get(sprintf('/api/open/cities/%s/?access_token=%s', $cityId, $accessToken))
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
            ->get('/api/open/cities/?access_token=' . $accessToken)
            ->then()
            ->retrieve();
    }
    
}
