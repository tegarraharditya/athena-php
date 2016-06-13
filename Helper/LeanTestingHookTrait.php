<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/29/16
 * Time: 2:19 PM
 */

namespace Tests\Helper;

use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Symfony\Component\Console\Event\ConsoleEvent;
use Tests\Tracker\LeanTesting;

trait LeanTestingHookTrait
{
    static $exceptions = [];

    /**
     * @param AfterStepScope $scope
     * @AfterStep
     */
    public static function afterStepHook(AfterStepScope $scope)
    {
        //printf('after step hook');
        if ($scope->getTestResult()->isPassed()) {
            return;
        }

        $exception = $scope->getTestResult()->getException();
        $exceptionType = get_class($exception);
        $exceptionMessage = $exception->getMessage();

        if (method_exists($exception, 'getTraceAsString')) {
            $exceptionTrace = $exception->getTraceAsString();
        }
        var_dump($scope->getStep());

        static::$exceptions[] = sprintf("%s: %s\n\n%s\n%s", $exceptionType, $exceptionMessage, $exceptionTrace);
    }

    /**
     * @param AfterScenarioScope $scope
     * @AfterScenario
     */
    public static function afterScenario(AfterScenarioScope $scope)
    {
        /*
            TestResult::PASSED = 0;
            TestResult::SKIPPED =  10;
            TestResult::PENDING = 20;
            TestResult::FAILED = 99;
            StepResult::UNDEFINED = 30;
        */

        //printf('after Scenario hook');
        printf("Result code: %d\n", $scope->getTestResult()->getResultCode());
        printf("Is passed: %d\n", $scope->getTestResult()->isPassed());

        $description = print_r(static::$exceptions,true);
        $title = $scope->getScenario()->getTitle();
        $steps = $scope->getScenario()->getSteps();

        //self::getSteps($steps);
        /*$steps = $scope->getScenario()->getSteps();
        $line = $scope->getScenario()->getLine();
        $keyword = $scope->getScenario()->getKeyword();
        $nodetype = $scope->getScenario()->getNodeType();
        $tags = $scope->getScenario()->getTags();*/

        /*if(!$scope->getTestResult()->isPassed()){
            $leantesting = new LeanTesting(13466);
            $dataJson = $leantesting->createDataForBug($title, $description, $steps, 16570,'v1.0');
            $leantesting->createBug($dataJson);

        }*/

        // reset exceptions after each scenario
        static::$exceptions = [];
    }

}