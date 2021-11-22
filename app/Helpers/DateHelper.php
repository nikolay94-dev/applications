<?php

namespace App\Helpers;

class DateHelper
{
    public function getFormattedDate($date = null)
    {

        return $date ? date("Y-m-d", strtotime($date)) : null;
    }
}
