<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferhistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount' ,
        'from_account',
        'to_account',
        'transfer_date',
    ];
}
