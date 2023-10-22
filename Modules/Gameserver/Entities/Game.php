<?php

namespace Modules\Gameserver\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "desc",
        "image",
        "color"
    ];

    protected static function newFactory()
    {
        return \Modules\Gameserver\Database\factories\GameFactory::new();
    }

    public function gameServers()
    {
        return $this->hasMany(GameServer::class, 'game_id', 'id');
    }
}
