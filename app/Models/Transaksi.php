<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "master_category_coa";
    protected $fillable = [
        "date",
        "code",
        "name",
        "desc",
        "debit",
        "credit"
    ];
}