<?php

namespace Modules\Gameserver\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameServer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "tag",
        "wt",
        "kt",
        "desc",
        "host",
        "url",
        "payserver",
        "lang",
        "database",
        "database_host",
        "database_username",
        "database_password",
        "user_data_table",
        "game_id",
        "status"
    ];

    protected static function newFactory()
    {
        return \Modules\Gameserver\Database\factories\GameServerFactory::new();
    }

    public function game()
    {
        return $this->hasOne(Game::class, 'game_id', 'id');
    }
}
