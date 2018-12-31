<?php

namespace App\Models;

use Baopham\DynamoDb\DynamoDbModel as Model;

class Dht22 extends Model
{
    protected $table = 'kamekusa_dht22';

    protected $primaryKey = 'id';

    protected $compositeKey = ['id', 'expire'];

    public $timestamps = false;

    protected $fillable = [
        'id',
        'expire',
        'payload',
    ];
}
