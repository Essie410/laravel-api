<?php

namespace App\Helpers;

trait Functions
{
   private function HumanTime($carbon)
   {
      $formattedTime = $carbon->diffForHumans();
      $seconds = $carbon->diffInSeconds();
      if ($seconds < 60) {
         return "just now";
      } else {
         return $formattedTime;
      };
   }
}
