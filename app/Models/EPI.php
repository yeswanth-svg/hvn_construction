<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EPI extends Model
{
    //
    use HasFactory, Notifiable;
    protected $table = 'e_p_i';
    protected $fillable = [
        'project_id',
        'plot_no',
        'ownership',
        'name',
        'geo_coordinates_n',
        'geo_coordinates_e',
        'plot_area_sq_yds',
        'plot_area_cents',
        'facing',
        'size_east',
        'size_west',
        'size_north',
        'size_south',
        'plot_availability_for_sale',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectInformation::class);
    }

    public function customers()
    {
        return $this->hasMany(CustomerDetail::class, 'plot_no');
    }

}
