<?php

namespace App\Entities;

use Illuminate\Support\Facades\Redis;

trait Learning
{
    public function completeLesson($lesson)
    {
        Redis::sadd("user:{$this->id}:series:{$lesson->series->id}", $lesson->id);
    }

    public function percentageCompletedForSeries($series)
    {
        $numberOfLessonsInSeries = $series->lessons->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForASeries($series);

        return ($numberOfCompletedLessons / $numberOfLessonsInSeries) * 100;
    }

    public function getNumberOfCompletedLessonsForASeries($series)
    {
        return count(Redis::smemebers("user:{$this->id}:series:{$series->id}"));
    }
}
