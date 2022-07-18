<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'hotels';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hotel_name',
        'phone_number',
        'email_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hotelNameCreateVouchers()
    {
        return $this->hasMany(CreateVoucher::class, 'hotel_name_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
