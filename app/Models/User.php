<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    // Optional: specify the primary key if it's not `id`
    protected $primaryKey = 'id';

    // Optional: indicate if the primary key is auto-incrementing
    public $incrementing = true;

    // Optional: specify the key type if not int
    protected $keyType = 'int';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'additionalcomment',
    ];

}
