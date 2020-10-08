<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExistingStaffInfo extends Model
{
    protected $connection = 'sqlsrv2';
    protected $table = 'dbo.V_ED_STAFF_INFO';

    // protected $fillable = ['STAFFNO', 'STAFFNAME', 'GRADE', 'DESCRIPTION'];
}
