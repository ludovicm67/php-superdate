<?php

namespace ludovicm67\SuperDate\Tests;

use PHPUnit\Framework\TestCase;
use ludovicm67\SuperDate\Date;

final class DateTest extends TestCase
{
    public function testDateCanBeNull(): void
    {
        $date = new Date();
        $datetime = new \DateTime();

        $this->assertInstanceOf(Date::class, $date);
        $this->assertEquals($datetime->format('Y-m-d'), $date->format());
    }

    public function testDateCanBeExplicitlyNull(): void
    {
        $date = new Date(null);
        $datetime = new \DateTime();

        $this->assertInstanceOf(Date::class, $date);
        $this->assertEquals($datetime->format('Y-m-d'), $date->format());
    }

    public function testDateCanBeAString(): void
    {
        $date = new Date("2019-03-21");
        $datetime = new \DateTime("2019-03-21");

        $this->assertInstanceOf(Date::class, $date);
        $this->assertEquals($datetime->format('Y-m-d'), $date->format());
    }

    public function testDateCanBeADate(): void
    {
        $date = new Date("2019-03-21");
        $dateObj = new Date($date);

        $this->assertInstanceOf(Date::class, $date);
        $this->assertEquals($dateObj->format(), $date->format());
    }

    public function testDateCanBeADateTime(): void
    {
        $date = new Date("2019-03-21");
        $datetime = new \DateTime("2019-03-21");
        $dateObj = new Date($datetime);


        $this->assertInstanceOf(Date::class, $date);
        $this->assertEquals($dateObj->format(), $date->format());
    }

    public function testAllDaysTo(): void
    {
        $date = new Date("2019-03-21");
        $allDaysTo = $date->allDaysTo("2019-04-03");

        $this->assertEquals(count($allDaysTo), 14);
    }

    public function testIsWorkingDayOrWeekend(): void
    {
        $dateWeek = new Date("2019-03-21");
        $dateWeekend = new Date("2019-03-23");
        $dateWeekendSunday = new Date("2019-03-24");

        $this->assertTrue($dateWeek->isWeekDay());
        $this->assertFalse($dateWeek->isWeekEnd());
        $this->assertFalse($dateWeekend->isWeekDay());
        $this->assertTrue($dateWeekend->isWeekEnd());
        $this->assertFalse($dateWeekendSunday->isWeekDay());
        $this->assertTrue($dateWeekendSunday->isWeekEnd());
    }

    public function testIsHoliday(): void
    {
        $date = new Date("2019-03-21");
        $newYear = new Date("2019-01-01");
        $easter = new Date("2019-04-21");
        $vendrediSaint = new Date("2019-04-19");
        $lundiPaques = new Date("2019-04-22");
        $ascension = new Date("2019-05-30");
        $pentecote = new Date("2019-06-09");
        $lundiPentecote = new Date("2019-06-10");
        $feteTravail = new Date("2019-05-01");
        $victoireAllies = new Date("2019-05-08");
        $feteNationale = new Date("2019-07-14");
        $assomption = new Date("2019-08-15");
        $toussaint = new Date("2019-11-01");
        $armistice = new Date("2019-11-11");
        $noel = new Date("2019-12-25");
        $stEtienne = new Date("2019-12-26");

        $this->assertFalse($date->isHoliday());
        $this->assertTrue($newYear->isHoliday());
        $this->assertTrue($easter->isHoliday());
        $this->assertTrue($vendrediSaint->isHoliday());
        $this->assertTrue($lundiPaques->isHoliday());
        $this->assertTrue($ascension->isHoliday());
        $this->assertTrue($pentecote->isHoliday());
        $this->assertTrue($lundiPentecote->isHoliday());
        $this->assertTrue($feteTravail->isHoliday());
        $this->assertTrue($victoireAllies->isHoliday());
        $this->assertTrue($feteNationale->isHoliday());
        $this->assertTrue($assomption->isHoliday());
        $this->assertTrue($toussaint->isHoliday());
        $this->assertTrue($armistice->isHoliday());
        $this->assertTrue($noel->isHoliday());
        $this->assertTrue($stEtienne->isHoliday());
    }
}
