<?php

namespace Tests\Api\open\pages;

class RegionPage extends BasePage {
    
    /**
     * Retrieve single region details.
     *
     * @param int    $regionId    District to be retrieved identification
     * @param string $accessToken Request authentication token
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function getWithIdAction($regionId, $accessToken)
    {
        return $this->client()
            ->get(sprintf('/api/open/regions/%s/?access_token=%s', $regionId, $accessToken))
            ->then()
            ->retrieve();
    }

    /**
     * Get a list of available regions.
     *
     * @param string $accessToken Request authentication token
     *
     * @return \Athena\Api\Response\ResponseFormatter
     */
    public function getAction($accessToken)
    {
        return $this->client()
            ->get('/api/open/regions/?access_token=' . $accessToken)
            ->then()
            ->retrieve();
    }
    
}