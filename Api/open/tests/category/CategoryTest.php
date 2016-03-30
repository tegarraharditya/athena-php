<?php
namespace Tests\Api\open\tests\category;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\open\pages\CategoryPage;
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

        for ($idx = 0; $idx < count($expectedCategories); $idx++) {
            $this->assertEquals($expectedCategories[$idx], $categoriesList[$idx]);
        }

        $this->assertEquals(200, $categoriesStatusCode);
    }

    public function testCategories_IdIsGiven_ReturnOneJsonElementWithCategoryAndReturnHttpCode200()
    {
        $expectedCategory = (new Sinon())->randomCategory();
        $catPage = new CategoryPage();
        $accessToken = $catPage->getAccessToken();

        $apiResp = $catPage->getWithIdAction($expectedCategory['id'], $accessToken);

        $this->assertEquals($expectedCategory, $apiResp->fromJson());
        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
    }

    /**
     * TODO Fix in atlas to return 404 when category is not found
     *
     * @throws GuzzleHttp\Exception\ClientException
     * @expectedExceptionCode 503
     */
    public function testCategories_WrongIdIsGiven_ReturnHttpCode503()
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

