<?php

namespace Tests\Api\v1\pages;

use Tests\Atlas\Sinon;

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
    public function getFromApiWithIdAction($regionId, $accessToken)
    {
        return $this->client()
            ->get(sprintf('/api/v1/regions/%s/?access_token=%s', $regionId, $accessToken))
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
    public function getFromApiAction($accessToken)
    {
        return $this->client()
            ->get('/api/v1/regions/?access_token=' . $accessToken)
            ->then()
            ->retrieve();
    }
    
    /** Sinon Action **/
    
    public function getFromSinonRandomRegion()
    {
        return (new Sinon($this->getModule()))->randomRegion();
    }
    
    public function getFromSinonAllRegion()
    {
        return (new Sinon($this->getModule()))->allRegions();
    }
}