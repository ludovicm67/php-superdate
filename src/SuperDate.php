<?php

class SuperDate {
  private $date;

  public function __construct($date = null) {
    $this->date = $this->initDate($date);
  }

  private function initDate($date) {
    if (is_null($date)) {
      return new DateTime();
    }
    if (is_string($date)) {
      return new DateTime($date);
    }
    if (is_object($date)) {
      return $date;
    }
    return new DateTime();
  }

  public function format() {
    return $this->date->format('Y-m-d');
  }

  public function allDaysTo($date) {
    $otherDate = $this->initDate($date);

    $period = new DatePeriod(
      new DateTime($this->format()),
      new DateInterval('P1D'),
      new DateTime($otherDate->format('Y-m-d') . ' 23:59:59')
    );

    $r = array_map(function ($d) {
      return new self($d);
    }, iterator_to_array($period));
    return $r;
  }

  public function isWeekDay() {
    return !$this->isWeekEnd();
  }

  public function isWeekEnd() {
    return $this->date->format('N') >= 6;
  }

  public function isHoliday() {
    $year = intval($this->date->format('Y'));
    $month = intval($this->date->format('m'));
    $day = intval($this->date->format('d'));

    $formatted = $this->format();

    // easter
    $base = new DateTime("$year-03-21");
    $days = easter_days($year);
    $paques = $base->add(new DateInterval("P{$days}D"));
    $easter = $paques->format('Y-m-d');

    // days based on easter
    $vendrediSaint = (new DateTime($easter))->sub(new DateInterval("P2D"));
    $lundiPaques = (new DateTime($easter))->add(new DateInterval("P1D"));
    $ascension = (new DateTime($easter))->add(new DateInterval("P39D"));
    $pentecote = (new DateTime($easter))->add(new DateInterval("P49D"));
    $lundiPentecote = (new DateTime($easter))->add(new DateInterval("P50D"));

    if ($paques->format('Y-m-d') == $formatted) {
      return true;
    }

    if ($vendrediSaint->format('Y-m-d') == $formatted) {
      return true;
    }

    if ($lundiPaques->format('Y-m-d') == $formatted) {
      return true;
    }

    if ($ascension->format('Y-m-d') == $formatted) {
      return true;
    }

    if ($pentecote->format('Y-m-d') == $formatted) {
      return true;
    }

    if ($lundiPentecote->format('Y-m-d') == $formatted) {
      return true;
    }


    // Nouvel an
    if ($month == 1 && $day == 1) {
      return true;
    }

    // Fête du travail
    if ($month == 5 && $day == 1) {
      return true;
    }

    // Victoire des alliés
    if ($month == 5 && $day == 8) {
      return true;
    }

    // Fête nationale
    if ($month == 7 && $day == 14) {
      return true;
    }

    // Assomption
    if ($month == 8 && $day == 15) {
      return true;
    }

    // Toussaint
    if ($month == 11 && $day == 1) {
      return true;
    }

    // Armistice
    if ($month == 11 && $day == 11) {
      return true;
    }

    // Noël
    if ($month == 12 && $day == 25) {
      return true;
    }

    // Saint-Etienne
    if ($month == 12 && $day == 26) {
      return true;
    }

    return false;
  }
}
