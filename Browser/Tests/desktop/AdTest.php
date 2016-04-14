<?php

namespace Tests\Browser\Tests\desktop;

use Tests\Atlas\Sinon;
use Tests\Pages\desktop\AdPage;
use Athena\Athena;
use Athena\Test\AthenaBrowserTestCase;

class AdTest extends AthenaBrowserTestCase
{  
    
    public function testPostAd_AsGuest_AllDataCorrect_ReturnSuccessPage()
    {
        $page = new AdPage();
        $page->open();
        $result = $page->postingAdAction(Sinon::generateEmail());
        $result->findAndAssertThat()->textEquals('Terima kasih, iklan Anda berhasil disimpan!')->elementWithCss(AdPage::ELEMENT_SUCCESSBOX);
    }
        
    public function testAdDetailPage_CreateActiveAdWithSinon_AdDetailPageAvailable()
    {
        $bind = [
            'title' => 'Random title with '. (new AdPage())->randomText(),
            'description' => 'Random description with '.(new AdPage())->randomText(300)
        ];
        $adUrl = (new Sinon())->createAd($bind);
        
        $page = Athena::browser()->get($adUrl);
        $page->findAndAssertThat()->textEquals($bind['description'])->elementWithId(AdPage::ELEMENT_TEXT_DESCRIPTION);
    }
    
    public function testDeleteAd_CreateActiveAdWithSinon_DeleteCreatedAdSuccess()
    {
        $sinon = new Sinon();
        
        $createdAd = $sinon->createActiveAd();
        $ad = $createdAd['ad'];
        $session = $sinon->createUserSession($ad['user_id']);
        
        $browser = Athena::browser();
        $page = $browser->get('/');
        $browser->setSession($session['sessionid']);
        
        $page->find()->elementWithId(AdPage::ELEMENT_LINK_LOGIN)->click();
        $page->wait(AdPage::TIMEOUT)->untilPresenceOf()->elementWithId(AdPage::ELEMENT_TABLE_ADS);
        $page->find()->elementWithCss(sprintf(AdPage::ELEMENT_LINK_DEACTIVATE, $ad['id']))->click();
        $page->wait(AdPage::TIMEOUT)->untilPresenceOf()->elementWithId(AdPage::ELEMENT_BUTTON_DELETE);
        $id = $this->getRandomElementId($page->find()->elementsWithCss(AdPage::ELEMENT_RADIO_REMOVEREASON));
        
        $page->find()->elementWithId(sprintf(AdPage::ELEMENT_OPTION_REMOVEREASON, $id))->click();
        $page->find()->elementWithId(AdPage::ELEMENT_BUTTON_DELETE)->click();
        $browser->get('archive');
        
        $page->wait(AdPage::TIMEOUT)->untilPresenceOf()->elementWithCss(AdPage::ELEMENT_LINK_REMOVE);
        $page->findAndAssertThat()->existsAtLeastOnce()->elementWithXpath('//a[@href="'.$createdAd['url'].'"]');
    }
    
    private function getRandomElementId($elements = [])
    {
        $rand = rand(1, count($elements));
        $i = $id = 1;
        foreach ($elements as $element)
        {
            $id = $element->getAttribute('value');
            if($i == $rand) break;
            $i++;
        }
        
        return $id;
        
    }
}