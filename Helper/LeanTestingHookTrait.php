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


    public static function afterStepHook(AfterStepScope $scope)
    {
        if ($scope->getTestResult()->isPassed()) {
            return;
        }

        $exception = $scope->getTestResult()->getException();
        $exceptionType = get_class($exception);
        $exceptionMessage = $exception->getMessage();

        if (method_exists($exception, 'getTraceAsString')) {
            $exceptionTrace = $exception->getTraceAsString();
        }

        static::$exceptions[] = sprintf("%s: %s\n\n%s", $exceptionType, $exceptionMessage, $exceptionTrace);
    }


    public static function afterScenario(AfterScenarioScope $scope)
    {
        /*
            TestResult::PASSED = 0;
            TestResult::SKIPPED =  10;
            TestResult::PENDING = 20;
            TestResult::FAILED = 99;
            StepResult::UNDEFINED = 30;
         */
        /*
        printf("Result code: %d\n", $scope->getTestResult()->getResultCode());
        printf("Is passed: %d\n", $scope->getTestResult()->isPassed());
        printf("Exceptions: %s\n", print_r(static::$exceptions, true));*/
        $title = print_r(static::$exceptions);
        var_dump($title);
        if(!$scope->getTestResult()->isPassed()){
            $leantesting = new LeanTesting(13466);
            $dataJson = $leantesting->createDataForBug($title,16570,'v1.0');
            $leantesting->createBug($dataJson);
        }

        // reset exceptions after each scenario
        static::$exceptions = [];

    }
}