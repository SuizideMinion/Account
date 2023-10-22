<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return \Modules\Ticket\Database\factories\TicketGroupFactory::new();
    }
}
