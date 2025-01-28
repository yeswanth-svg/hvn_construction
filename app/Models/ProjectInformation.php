<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectInformation extends Model
{
    //
    use HasFactory, Notifiable;
    protected $fillable = [
        'project_name',
        'lp_no',
        'rera_no',
        'location',
        'survey_no',
        'extent',
    ];
    public function plotInformation()
    {
        return $this->hasMany(PlotLevelI::class);
    }


}
