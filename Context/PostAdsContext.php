<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 5/2/16
 * Time: 1:32 PM
 */

namespace Tests\Context;


use Tests\Pages\bdd\PostAds;

class PostAdsContext extends BaseContext
{


    private $postAds;

    public function __construct()
    {
        $this->postAds = new PostAds();
    }



}