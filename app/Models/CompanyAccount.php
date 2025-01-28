<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyAccount extends Model
{
    //
    use HasFactory;

    protected $fillable = [

        'bank_name',
        'account_name',
        'account_no',
        'ifsc_code',
    ];
}
