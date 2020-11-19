<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserExistingStaffInfo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $connection = 'sqlsrv2';
    protected $table = 'dbo.V_ED_STAFF_INFO';

    // protected $fillable = ['STAFFNO', 'STAFFNAME', 'GRADE', 'DESCRIPTION'];
}
