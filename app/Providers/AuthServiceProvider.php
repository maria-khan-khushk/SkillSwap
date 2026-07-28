<?php

namespace App\Providers;

use App\Models\Skill;
use App\Policies\SkillPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [

        Skill::class => SkillPolicy::class,

    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}