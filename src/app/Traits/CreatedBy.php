<?php

namespace LaravelEnso\TrackWho\app\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;

trait CreatedBy
{
    public static function bootCreatedBy()
    {
        self::creating(fn ($model) => $model->setCreatedBy());
    }

    public function createdBy(): Relation
    {
        return $this->belongsTo(
            config('auth.providers.users.model'), 'created_by'
        );
    }

    private function setCreatedBy()
    {
        $this->created_by = optional(Auth::user())->id;
    }
}
