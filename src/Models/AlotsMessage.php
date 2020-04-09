<?php

namespace Bhavinjr\Alots\Models;

use Illuminate\Database\Eloquent\Model;

class AlotsMessage extends Model
{
    protected $fillable = ['mobile_number', 'message_id', 'message', 'status'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('alots.table_names.messages'));
    }
}
