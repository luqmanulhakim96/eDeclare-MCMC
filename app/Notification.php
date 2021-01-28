<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
class Notification extends DatabaseNotification
{
  protected $connection = 'sqlsrv';


  protected $table = 'notifications';
}
