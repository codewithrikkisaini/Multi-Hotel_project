<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Tenantable
{
    protected static function bootTenantable()
    {
        static::addGlobalScope('hotel_id', function (Builder $builder) {
            // If user is logged in
            if (auth()->check()) {
                $user = auth()->user();
                
                // Assuming Super Admin can see all or bypasses this scope
                // We check if role is Merahkie Super Admin (assuming role_id = 1 or special logic)
                // Adjust role checking logic as per your application's setup
                $isSuperAdmin = $user->role && $user->role->name === 'Merahkie Super Admin';

                if (!$isSuperAdmin && $user->hotel_id) {
                    $builder->where($builder->getQuery()->from . '.hotel_id', $user->hotel_id);
                }
            }
        });

        static::creating(function ($model) {
            if (auth()->check()) {
                $user = auth()->user();
                $isSuperAdmin = $user->role && $user->role->name === 'Merahkie Super Admin';
                
                if (!$isSuperAdmin && $user->hotel_id) {
                    $model->hotel_id = $user->hotel_id;
                }
            }
        });
    }

    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class);
    }
}
