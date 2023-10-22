<?php

namespace Modules\Ticket\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'image', 'user_id', 'group_id', 'ticket_id', 'status'];

    protected static function newFactory()
    {
        return \Modules\Ticket\Database\factories\TicketPostFactory::new();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function group()
    {
        return $this->hasOne(TicketGroup::class, 'id', 'group_id');
    }
}
