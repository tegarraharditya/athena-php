<?php
namespace Tests\Tracker;

use Athena\Athena;
use Athena\Page\BaseApiPage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/26/16
 * Time: 10:41 AM
 */
class LeanTesting extends BaseApiPage
{
    private $base_uri;
    private $base_setting;
    private $token;
    private $project_id;
    public function __construct($id)
    {
        $url = (array)Athena::settings()->getAll();
        $this->base_setting=$url['bug-tracker'];
        $this->token=$this->base_setting['token'];
        $this->base_uri=$this->base_setting['base-url'];
        $this->project_id=$id;
    }

    public function getAllProjects(){
        $results = Athena::api()->get($this->base_uri.'/v1/projects')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();

        return $results['projects'];
    }

    public function createBug(){
        $data = json_encode('');
        $list = Athena::api()->post($this->base_uri.'/v1/projects/'.$this->project_id.'/bugs')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->withBody()
        ;
    }

    public function getBugTypeScheme(){
        $results = Athena::api()->get($this->base_uri.'/v1/projects/'.$this->project_id.'/bug-type-scheme')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();

        return $results['scheme'];
    }

    public function getBugIdFromValue($value){
        $id=0;
        $data = $this->getBugTypeScheme($this->project_id);
        for($i=0;$i<count($data);$i++){
            foreach($data as $data_key=>$data_value){
                if($data_value==$value){
                    $id=$data_key;
                    break;
                }
            }
        }
        return $id;
    }




}