<?php
/**
 * Created by PhpStorm.
 * User: kestu
 * Date: 2017.05.08
 * Time: 10:35
 */

namespace App\Http\Controllers;

use Carbon\Carbon;

trait Functions
{
    public function weekAgoStatic($class) {
    return $class::whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->startOfWeek()])->count();
    }
}