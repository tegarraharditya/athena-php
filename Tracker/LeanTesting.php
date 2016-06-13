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

        //$file = file_get_contents($this->base_setting['path-token'],FILE_USE_INCLUDE_PATH);

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

    public function createBug($dataJson){
        $result = Athena::api()->post($this->base_uri.'/v1/projects/'.$this->project_id.'/bugs')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->withBody($dataJson,'application/json')
            ->then()->getResponseHolder()->getStatusCode();
        ;
        //var_dump(Athena::api()->post($this->base_uri.'/v1/projects/'.$this->project_id.'/bugs'));
        var_dump($result);
        return $result;
    }

    public function updateBug($bug_id,$dataJson){
        $result = Athena::api()->put($this->base_uri.'/v1/bugs/'.$bug_id)
            ->withHeader('Authorization','Bearer '.$this->token)
            ->withBody($dataJson,'application/json')
            ->then()->getResponseHolder()->getStatusCode();

        return $result;
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

    public function getVersions(){
        $results = Athena::api()->get($this->base_uri.'/v1/projects/'.$this->project_id.'/versions')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();
        ;

        return $results;
    }

    /**
     * @param $title
     * @param $description
     * @param $steps
     * @param $project_version_id
     * @param $project_version
     * @return string
     */
    public function createDataForBug($title, $description, $steps,$project_version_id,$project_version){
        $description2 = 'ini contoh';
        $data = '
        {
            "title": "'.$title.'",
            "status_id" : 1,
            "severity_id": 2,
            "type_id": 1,
            "priority_id": 1,
            "description": "'.$description2.'",
            "project_version_id": '.$project_version_id.',
            "project_version": "'.$project_version.'",
            "assigned_user_id" : 17249
        }';
        return $data;
    }

    public function getProjectComponents(){
        $result = Athena::api()->get($this->base_uri.'/v1/projects/'.$this->project_id.'/sections')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();

        return $result;
    }

    public function addingProjectVersion($version_id,$version){
        $data = '
        {
            "id": '.$version_id.',
            "number": "'.$version.'",
            "project_id": '.$this->project_id.'
        }';

        $result = Athena::api()->post($this->base_uri.'/v1/projects/'.$this->project_id.'/versions')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->withBody($data,'application/json')
            ->then()->getResponseHolder()->getStatusCode();

        return $result;
    }

    public function getBugStatusScheme(){
        $result = Athena::api()->get($this->base_uri.'/v1/projects/'.$this->project_id.'/bug-status-scheme')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();

        return $result;
    }

    public function getSeverityBugScheme(){
        $result = Athena::api()->get($this->base_uri.'/v1/projects/'.$this->project_id.'/bug-severity-scheme')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();

        return $result;
    }

    public function getAllBugs(){
        $result = Athena::api()->get($this->base_uri.'/v1/projects/'.$this->project_id.'/bugs')
            ->withHeader('Authorization','Bearer '.$this->token)
            ->then()->retrieve()->fromJson();

        return $result;
    }

    public function getAllOpenBugs(){

    }


}