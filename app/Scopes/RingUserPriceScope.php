<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class RingUserPriceScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // Add a query to include the product_total_price calculation
        $builder->select('rings.*', 
        DB::raw('COALESCE(setting_wholesaler_price, 0) + COALESCE(stone_wholesaler_price, 0) AS product_price'),
        DB::raw('COALESCE(setting_user_price, 0) + COALESCE(stone_user_price, 0) AS user_price')
    );
        
    }
}
