<?php
namespace Tests\Api\v1\pages;

use Tests\Atlas\Sinon;

class AdvertPage extends BasePage {

    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Create a new advert.
     *
     * @param array  $fixture     Advert structure filled with fixture data
     * @param string $accessToken Token for request authentication
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function createAdvertAction(array $fixture, $accessToken)
    {
        $data = json_encode($fixture);
        
        return $this->client()
            ->post('/api/v1/account/adverts/?access_token='.$accessToken)
            ->withBody($data, 'application/json')
            ->then()
            ->retrieve();
    }

    /**
     * Create a new advert an return the errors provided by the API response.
     *
     * @param array  $fixture     Advert structure filled with fixture data
     * @param string $accessToken Token for request authentication
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function createAdvertAndReturnErrors($fixture, $accessToken)
    {
        $data = json_encode($fixture);
        
        return $this->client()
            ->post('/api/v1/account/adverts/?access_token=' . $accessToken)
            ->withBody($data, 'application/json')
            ->withOption('exceptions', FALSE)
            ->then()
            ->retrieve();
    }

    /**
     * Modify existing advert information.
     *
     * @param int    $id                 Target advert
     * @param array  $modifiedAdvertData Modified advert data
     * @param string $accessToken Token  for request authentication
     * 
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function modifyAdvertWithIdAction($id, $modifiedAdvertData, $accessToken)
    {
        $data = json_encode($modifiedAdvertData);

        return $this->client()
            ->put(sprintf('/api/v1/account/adverts/%s/?access_token=%s', $id, $accessToken))
            ->withBody($data, 'application/json')
            ->withOption('exceptions', FALSE)
            ->then()
            ->retrieve();
    }

    /**
     * Get advert structure filled with fixture data.
     *
     * @return array
     */
    public function getSampleAdvertData()
    {
        $sinon = new Sinon();
        $city = $sinon->randomCity();
        $category = $sinon->randomCategoryParametersData();
        $description = <<<DESC
Lorem ipsum dolor sit amet, nec alia postea accusata id, illum perpetua vel ad. Sed an scripserit deterruisset. At feugait noluisse facilisis vel, veri nominavi ea usu. Vim alii diceret ex, eam graecis dignissim argumentum ad.

At erroribus sententiae vis, quod eirmod sed ei. Vix ad oporteat dissentiet, vim id nihil omnesque officiis, id malorum signiferumque usu. An agam principes nam. Harum putant laoreet sea in, tation offendit eloquentiam ei eum, minim everti gubergren cu his. No dignissim deterruisset mediocritatem ius, vidisse ancillae lobortis sit ex, dolore doctus id usu. Sed eu vero impedit, scripta philosophia sed id. Pro gubergren democritum ea, te exerci detracto est.
DESC;

        return [
            'city_id'         => $city['id'],
            'region_id'       => $city['region_id'],
            'category_id'     => $category['id'],
            'offer_seek'      => $category['offer_seek'],
            'params'          => $category['parameters'],
            'title'           => 'Sample Advert Title ' . date('H:i:s'),
            'description'     => $description,
            'advertiser_type' => 'private',
            'contact'         => ['person' => 'Anonymous', 'phone_numbers' => ['0812345678']]
        ];
    }

    /**
     * Get advert structure filled with fixture data, without location information.
     *
     * @return array
     */
    public function getSampleAdvertDataWithoutLocation()
    {
        $data = $this->getSampleAdvertData();

        return array_diff_key($data, array_flip(['city_id', 'region_id']));
    }

    /**
     * Get advert structure filled with fixture data, without category information.
     *
     * @return array
     */
    public function getSampleAdvertDataWithoutCategory()
    {
        $data = $this->getSampleAdvertData();

        return array_diff_key($data, array_flip(['category_id']));
    }

    /**
     * Get new advert request structure filled with fixture data.
     *
     * @param int $userId Advert owner identification
     *
     * @return array
     */
    public function getNewAdvertWithProperStructureForRequest($userId = null)
    {
        $sinonAd = (new Sinon())->createActiveAd($userId)['ad'];
        
        $params = isset($sinonAd['params']) ? $this->convertParams($sinonAd['params']) : [];

        $struct = [
            'id'              => $sinonAd['id'],
            'title'           => $sinonAd['title'],
            'description'     => $sinonAd['description'],
            'category_id'     => $sinonAd['category_id'],
            'region_id'       => $sinonAd['region_id'],
            'city_id'         => $sinonAd['city_id'],
            'contact'         => [
                                'person' => !empty($sinonAd['person']) ?: 'Anonymous', 
                                'phone_numbers' => ['0812345678']
                                ],
            'advertiser_type' => $sinonAd['private_business'],
            'params'          => $params,
            'offer_seek'      => $sinonAd['offer_seek']
        ];

        if (isset($sinonAd['district_id'])) {
            $struct['district_id'] = $sinonAd['district_id'];
        }

        return $struct;
    }
    
    private function convertParams($stringParams)
    {
        $level1 = explode("<br>", $stringParams);
        $result = [];
        
        foreach ($level1 as $string)
        {
            $level2 = explode("<=>", $string);
            if($level2[0] == 'price')
            {
                $result['price'][] = $level2[1];
            } else 
            {
                $result[$level2[0]] = $level2[1];
            }
        }
        
        return $result;
    }
}