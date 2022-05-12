<?php
$x = strtotime(2020 - 4 - 11);
$y = strtotime(2020 - 3 - 11);
$selisih = abs($x - $y) / (60 * 60 * 24);
$ays = GetDays('2007-01-01', '2007-01-31');
echo $ays;

function GetDays($sStartDate, $sEndDate)
{
    // Firstly, format the provided dates.  
    // This function works best with YYYY-MM-DD  
    // but other date formats will work thanks  
    // to strtotime().  
    $sStartDate = gmdate("Y-m-d", strtotime($sStartDate));
    $sEndDate = gmdate("Y-m-d", strtotime($sEndDate));

    // Start the variable off with the start date  
    $aDays[] = $sStartDate;

    // Set a 'temp' variable, sCurrentDate, with  
    // the start date - before beginning the loop  
    $sCurrentDate = $sStartDate;

    // While the current date is less than the end date  
    while ($sCurrentDate < $sEndDate) {
        // Add a day to the current date  
        $sCurrentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));

        // Add this new day to the aDays array  
        $aDays[] = $sCurrentDate;
    }

    // Once the loop has finished, return the  
    // array of days.  
    return $aDays;
}
