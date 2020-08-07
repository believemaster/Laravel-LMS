<?php

namespace App\Entities;

use App\Lesson;
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
        return count($this->getCompletedLessonsForASeries($series));
    }

    public function getCompletedLessonsForASeries($series)
    {
        Redis::smemebers("user:{$this->id}:series:{$series->id}");
    }

    public function hasStarted($series)
    {
        return $this->getNumberOfCompletedLessonForASeries($series) > 0;
    }

    public function getCompletedSeries($series)
    {
        $completedLessons = $this->getCompletedLessonsForASeries($series);

        return collect($completedLessons)->map(function ($lessonId) {
            return Lesson::find($lessonId);
        });
    }
}
