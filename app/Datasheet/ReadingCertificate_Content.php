<?php

namespace App\Datasheet;

use Illuminate\Database\Eloquent\Model;

class ReadingCertificate_Content extends Model
{
    protected $table = 'ReadingCertificate_Content';

    protected $fillable = [
        'id', 'RC_id', 'RC_ISBN', 'book_content', 'created_at','updated_at'
    ];

    protected $primaryKey = 'id';
}
