<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Category;
use MoonShine\Laravel\Models\MoonshineUser;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {

        return true;
    }

    public function view(MoonshineUser $user, Category $item): bool
    {
        return true;
    }

    public function create(MoonshineUser $user): bool
    {
        if(auth()->user()->moonshine_user_role_id !== 1){
            return false;
        }
        return true;
    }

    public function update(MoonshineUser $user, Category $item): bool
    {
        if(auth()->user()->moonshine_user_role_id !== 1){
            return false;
        }
        return true;
    }

    public function delete(MoonshineUser $user, Category $item): bool
    {
        if(auth()->user()->moonshine_user_role_id !== 1){
            return false;
        }
        return true;
    }

    public function restore(MoonshineUser $user, Category $item): bool
    {
        if(auth()->user()->moonshine_user_role_id !== 1){
            return false;
        }
        return true;
    }

    public function forceDelete(MoonshineUser $user, Category $item): bool
    {
        if(auth()->user()->moonshine_user_role_id !== 1){
            return false;
        }
        return true;
    }

    public function massDelete(MoonshineUser $user): bool
    {
        if(auth()->user()->moonshine_user_role_id !== 1){
            return false;
        }
        return true;
    }
}
