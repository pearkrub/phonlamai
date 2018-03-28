<?php
/**
 * Created by PhpStorm.
 * User: praibool
 * Date: 21/3/2018 AD
 * Time: 09:46
 */

class PhonlamaiHelper extends  AppHelper
{
    public function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = Array(
            "",
            "ม.ค.",
            "ก.พ.",
            "มี.ค.",
            "เม.ย.",
            "พ.ค.",
            "มิ.ย.",
            "ก.ค.",
            "ส.ค.",
            "ก.ย.",
            "ต.ค.",
            "พ.ย.",
            "ธ.ค."
        );
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    public function DateTimeThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = Array(
            "",
            "ม.ค.",
            "ก.พ.",
            "มี.ค.",
            "เม.ย.",
            "พ.ค.",
            "มิ.ย.",
            "ก.ค.",
            "ส.ค.",
            "ก.ย.",
            "ต.ค.",
            "พ.ย.",
            "ธ.ค."
        );
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds น.";
    }

    function timeAgo($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "นาทีที่แล้ว";
            }
            else{
                return "$minutes นาทีที่แล้ว";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "ชั่วโมงที่แล้ว";
            }else{
                return "$hours ชั่วโมวที่แล้ว";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "เมื่อวานนี้";
            }else{
                return "$days วันที่แล้ว";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "สัปดาห์ที่แล้ว";
            }else{
                return "$weeks สัปดาห์ที่แล้ว";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "เดือนที่แล้ว";
            }else{
                return "$months เดือนที่แล้ว";
            }
        }
        //Years
        else{
            if($years==1){
                return "ปีที่แล้ว";
            }else{
                return "$years ปีที่แล้ว";
            }
        }
    }
}