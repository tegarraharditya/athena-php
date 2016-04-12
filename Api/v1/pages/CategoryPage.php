<?php
namespace Tests\Api\v1\pages;

use Tests\Atlas\Sinon;

class CategoryPage extends BasePage {

    /**
     * Get a list of available categories.
     *
     * @return \Athena\Api\Response\ResponseFormatter
     */
    public function getFromApiAction($accessToken)
    {
        return $this->client()
            ->get('/api/v1/categories?access_token='.$accessToken)
            ->then()
            ->retrieve();
    }

    /**
     * Retrieve single category details.
     *
     * @param int $categoryId Category to be retrieved identification
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function getFromApiWithIdAction($categoryId, $accessToken)
    {
        return $this->client()
            ->get('/api/v1/categories/' . $categoryId . '?access_token=' . $accessToken)
            ->withOption('exceptions', FALSE)
            ->then()
            ->retrieve();
    }

    /**
     * Helper method to extract only the parameters code form $categoryDataParameters
     *
     * @param array $categoryDataParameters Extraction target
     *
     * @return array
     */
    public static function extractCategoryParametersCodes($categoryDataParameters)
    {
        $categoryParametresCodes = [];

        foreach ($categoryDataParameters as $data) {
            $categoryParametresCodes[$data["code"]] = $data["labels"];
        }

        return $categoryParametresCodes;
    }
    
    /** SINON Action **/
    
    
    public function getFromSinonAllRootCategories()
    {
        return (new Sinon($this->getModule()))->allRootCategories();
    }
    
    public function getFromSinonRandomCategory()
    {
        return (new Sinon($this->getModule()))->randomCategory();
    }
    
    public function getFromSinonRandomCategoryParametersData()
    {
        return (new Sinon($this->getModule()))->randomCategoryParametersData();
    }
    
}