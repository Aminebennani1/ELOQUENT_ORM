<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Article $article): bool
{
    return $user->id === $article->user_id || $user->hasRole('admin');
}

public function delete(User $user, Article $article): bool
{
    return $user->hasRole('admin');
}

}
