<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExistingStaffNextofKin extends Model
{
    protected $connection = 'sqlsrv2';
    protected $table = 'dbo.V_ED_STAFFNEXTOFKIN';

    // protected $fillable = ['STAFFNO', 'STAFFNAME', 'GRADE', 'DESCRIPTION'];
}
