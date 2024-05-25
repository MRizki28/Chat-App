<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tb_message';
    protected $fillable = [
        'id',
        'id_sender',
        'id_receiver',
        'message'
    ];
}
