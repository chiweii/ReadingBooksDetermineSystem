<?php

namespace App\Datasheet;

use Illuminate\Database\Eloquent\Model;

class ReadingCertificate extends Model
{
    protected $table = 'ReadingCertificate';

    protected $fillable = [
        'id', 'book_name', 'ISBN', 'author', 'publisher', 'publish_year','block','attest','classification','form','url','created_at','updated_at'
    ];

    protected $primaryKey = 'id';
}
