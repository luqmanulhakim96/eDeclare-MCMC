<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExistingStaff extends Model
{
    protected $connection = 'sqlsrv2';
    protected $table = 'dbo.V_ED_STAFF';

    // protected $fillable = ['STAFFNO', 'STAFFNAME', 'GRADE', 'DESCRIPTION'];
}
