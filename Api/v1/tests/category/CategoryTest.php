<?php
namespace Tests\Api\v1\tests\category;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\v1\pages\CategoryPage;
use Tests\Atlas\Sinon;

class CategoryTest extends AthenaAPITestCase {
    
    public function testCategories_NoIdIsGiven_ReturnJsonListWithAllRootCategoriesAndReturnHttpCode200()
    {
        $catPage = new CategoryPage();
        $expectedCategories = (new Sinon())->allRootCategories();

        $apiResp = $catPage->getAction($catPage->getAccessToken());

        $categoriesList = $apiResp->fromJson()['results'];
        $categoriesStatusCode = $apiResp->getResponse()->getStatusCode();

        usort($categoriesList, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        usort($expectedCategories, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        $selected_index = rand(0, count($expectedCategories) - 1);
        $this->assertEquals($expectedCategories[$selected_index]['id'], $categoriesList[$selected_index]['id']);
        $this->assertEquals($expectedCategories[$selected_index]['code'], $categoriesList[$selected_index]['code']);
        $this->assertEquals(200, $categoriesStatusCode);
    }

    public function testCategories_IdIsGiven_ReturnOneJsonElementWithCategoryAndReturnHttpCode200()
    {
        $expectedCategory = (new Sinon())->randomCategory();
        $catPage = new CategoryPage();
        $accessToken = $catPage->getAccessToken();

        $apiResp = $catPage->getWithIdAction($expectedCategory['id'], $accessToken);
        
        $this->assertEquals($expectedCategory['id'], $apiResp->fromJson()['id']);
        $this->assertEquals($expectedCategory['code'], $apiResp->fromJson()['code']);
        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
    }

    /**
     *
     * @throws GuzzleHttp\Exception\ClientException
     * @expectedExceptionCode 404
     */
    public function testCategories_WrongIdIsGiven_ReturnHttpCode404()
    {
        $catPage = new CategoryPage();
        $accessToken = $catPage->getAccessToken();

        $catPage->getWithIdAction(time(), $accessToken);
    }

    public function testCategories_IdIsGiven_ReturnJsonElementWithCategoryAndParametersAndReturnHttpCode200()
    {
        $catPage = new CategoryPage();
        $expectedCategoryParameters = (new Sinon())->randomCategoryParametersData();

        $apiResp = $catPage->getWithIdAction($expectedCategoryParameters['id'], $catPage->getAccessToken());

        $returnedCategoryData = $apiResp->fromJson();
        $returnedCategoryParameters = CategoryPage::extractCategoryParametersCodes($returnedCategoryData["parameters"]);

        foreach ($expectedCategoryParameters['parameters'] as $key => $value) {
            $this->assertArrayHasKey($key, $returnedCategoryParameters);
        }

        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
    }
}

