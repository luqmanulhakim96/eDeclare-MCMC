<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class NilaiHadiah extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    protected $connection = 'sqlsrv';
    

    protected $table = 'nilai_hadiahs';
    protected $fillable = [
      'nilai_hadiah'
    ];
}
