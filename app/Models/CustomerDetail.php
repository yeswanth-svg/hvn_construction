<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CustomerDetail extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'project_id',
        'plot_no',
        'customer_name',
        'phone_number',
        'pan_no',
        'aadhaar_no',
        'address',
        'market_value_per_sqyd',
        'price_per_sqyd',
        'price_per_cent',
        'total_plot_value',
        'total_market_value',
        'status',
    ];

    public function plot()
    {
        return $this->belongsTo(Epi::class, 'plot_no', 'id'); // Replace 'id' with the actual column name in the Epi table
    }

    public function project()
    {
        return $this->belongsTo(ProjectInformation::class);
    }

    public function calculatePlotValue()
    {
        $plotArea = $this->plot->plot_area_sq_yds;
        $this->plot_value = $this->price_per_sqyd * $plotArea;
        $this->save();
    }

    public function calculateMarketValue()
    {
        $marketValue = $this->market_value_per_sqyd * $this->plot->plot_area_sq_yds;
        $this->total_market_value = $marketValue;
        $this->save();
    }

    public function payments()
    {
        return $this->hasMany(PaymentDetail::class, 'customer_id');
    }



}
