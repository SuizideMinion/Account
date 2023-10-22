<?php

namespace Modules\Gameserver\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAccount extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Gameserver\Database\factories\UserAccountFactory::new();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function game()
    {
        return $this->hasOne(Game::class, 'game_id', 'id');
    }

    public function gameserver()
    {
        return $this->hasOne(GameServer::class, 'gameserver_id', 'id');
    }
}
