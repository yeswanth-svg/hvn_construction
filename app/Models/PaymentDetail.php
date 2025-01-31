<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentDetail extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'payment_date',
        'amount',
        'mode_of_payment',
        'details',
        'bank_name',
        'attachments',
        'remarks'
    ];

    public function project()
    {
        return $this->belongsTo(ProjectInformation::class, 'project_id');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerDetail::class, 'customer_id', 'id');
    }

    public function companyAccount()
    {
        return $this->belongsTo(CompanyAccount::class, 'remarks'); // Assuming 'remarks' is the foreign key
    }

}
