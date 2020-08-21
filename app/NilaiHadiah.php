<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class NilaiHadiah extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'nilai_hadiahs';
    protected $fillable = [
      'nilai_hadiah'
    ];
}
