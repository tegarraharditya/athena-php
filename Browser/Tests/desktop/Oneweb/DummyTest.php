<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/22/16
 * Time: 2:01 PM
 */

namespace Tests\Browser\Tests\desktop\Oneweb;

use Athena\Test\AthenaBrowserTestCase;
use Tests\Tracker\LeanTesting;


class DummyTest extends  AthenaBrowserTestCase
{
    public function testCoba(){
        $leantesting = new LeanTesting(13466);
        $a = $leantesting->getVersions();
        var_dump($a);
        /*$title = '';
        $project_version_id = '';
        $project_version = '';

        $data = '
        {
            "title": "'.$title.'",
            "status_id" : 1,
            "severity_id": 2,
            "type_id": 1,
            "priority_id": 1,
            "description": "From Automation Test",
            "project_version_id": '.$project_version_id.',
            "project_version": "'.$project_version.'"
        }';

        var_dump($data);*/
        //$title,$status_id,$severity_id,$type_id,$priority_id,$description,$project_version_id,$project_version
    }
}