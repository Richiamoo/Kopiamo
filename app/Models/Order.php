<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'notes',
        'orderStatus',
        'totalPrice',
        'paymentType',
        'paymentStatus',
    ];

    public function setUserData(User $user)
    {
        $this->fullname = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phonenum;
    }

    public function menu(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->hasOne('App\Models\Rating');
    }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
