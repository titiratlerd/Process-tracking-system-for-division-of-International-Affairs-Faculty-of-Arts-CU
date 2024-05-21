<?php

namespace App\Utils;
use \Datetime;
use App\Utils\DateUtils;

class DateUtils
{
    // $status_mapper = [
    //     0 => ['thai' => 'รอดำเนินการ', 'eng' => 'pending'],
    //     1 => ['thai' => 'เสร็จสิ้น', 'eng' => 'successful'],
    // ]

    // $lang = 'thai'
    // $status_mapper[$process[$i]->process_status][$lang]

    public static function getElapsedDays($startDate, $endDate)
    {
        $startDateTime = new DateTime($startDate);
        $endDateTime = new DateTime($endDate);
        $interval = $startDateTime->diff($endDateTime);
        return $interval->days;
    }

    public static function getCurrentDateJan1ElapsedDays()
    {
        $currentDate = new DateTime();
        $firstDayOfCurrentYear = new DateTime($currentDate->format('Y') . '-01-01');
        $interval = $currentDate->diff($firstDayOfCurrentYear);
        return $interval->days;
    }

    public static function getCurrentSemester()
    {
        $jan1 = '2024-01-01';
        $jan5 = '2024-01-05';
        $aug5 = '2024-08-05';

        $elapsedX = self::getElapsedDays($jan1, $jan5);
        $elapsedY = self::getElapsedDays($jan1, $aug5);
        $elapsedZ = self::getCurrentDateJan1ElapsedDays();

        if ($elapsedX <= $elapsedZ && $elapsedZ <= $elapsedY) {
            return 's2';
        } else {
            return 's1';
        }
    }
}