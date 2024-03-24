<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Multitenancy
{
    public static function bootMultitenancy()
    {
        if (auth()->check()) {
            // Automatically Injects Current Logged In User Id while calling create mass assignment method of model
            static::creating(function ($model) {
                $model->created_by_user_id = auth()->id();
            });
            // Automatically Checking the created_by_user_id while calling any model query
            if (request()->is('/dashboard/*') || request()->is('dashboard/*')) {
                static::addGlobalScope('created_by_user_id', function (Builder $builder) {
                    $builder->where('created_by_user_id', auth()->id());
                });
            }
        }
    }
}
