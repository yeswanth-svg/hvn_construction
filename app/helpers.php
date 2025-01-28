<?php


use Carbon\Carbon;

if (!function_exists('formatCurrency')) {
    function formatCurrency($amount)
    {
        $formatter = new \NumberFormatter('en_IN', \NumberFormatter::DECIMAL);
        return '₹ ' . $formatter->format($amount);
    }
}


function convertToWords($amount)
{
    $formatter = new \NumberFormatter('en_IN', \NumberFormatter::SPELLOUT);
    return ucfirst($formatter->format($amount) . ' Rupees Only');
}

function formatDate($date)
{
    return Carbon::parse($date)->format('d-m-Y');
}



if (!function_exists('routeForUser')) {
    /**
     * Get the route name based on the user's role.
     *
     * @param  string  $adminRoute
     * @param  string  $staffRoute
     * @return string
     */
    function routeForUser($adminRoute, $staffRoute)
    {
        return auth()->user()->hasRole('admin') ? $adminRoute : $staffRoute;
    }
}



