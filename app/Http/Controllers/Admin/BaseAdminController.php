<?php
/**
 * User: Gamma-iron
 * Date: 07.02.2020
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;


class BaseAdminController extends Controller
{
    protected function setSearchQuery(Builder $query, $search): void
    {
        if(filled($search))
            $query->where('name', 'like', '%'.$search.'%');
    }
}
