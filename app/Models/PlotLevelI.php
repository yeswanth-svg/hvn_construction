<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlotLevelI extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'plot_level_i';
    protected $fillable = [
        'project_id',
        'total_plots',
        'mortgaged_plots',
        'developer_plots',
        'land_owner_plots',
        'registered_plots',
        'booked_plots',
        'available_plots',

    ];

    public function project()
    {
        return $this->belongsTo(ProjectInformation::class);
    }
}
