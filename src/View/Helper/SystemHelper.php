<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Core\Configure;
use Cake\I18n\Time;

/**
 * System helper
 */
class SystemHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function display_date($date)
    {
        if(strlen($date)<1)
        {
            return '';
        }
        $display_string=date('d-M-Y',$date);
        if($display_string===false)
        {
            return '';
        }
        else
        {
            return $display_string;
        }
    }
    public function display_date_time($date)
    {
        if(strlen($date)<1)
        {
            return '';
        }
        $display_string=date('d-M-Y H:m:s',$date);
        if($display_string===false)
        {
            return '';
        }
        else
        {
            return $display_string;
        }
    }

    public function Get_Bng_to_Eng($str = NULL) {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '');
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '');
        $converted = str_replace($bangNumber, $engNumber, $str);
        return $converted;
    }

    public function get_date_diff($date1, $date2)
    {
        $diff = abs($date1 - $date2);

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        printf("%d years, %d months, %d days\n", $years, $months, $days);
    }

    public function get_remaining_lpr_years($dob, $lpr_age)
    {
        $lpr_year = new Time($dob);
        $lpr_year->modify('+'.$lpr_age .'years');

        $diff = abs(strtotime(date('d-m-Y')) - strtotime($this->Get_Bng_to_Eng(explode(' ', $lpr_year)[0])));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        printf("%d years, %d months, %d days\n", $years, $months, $days);
    }
}
