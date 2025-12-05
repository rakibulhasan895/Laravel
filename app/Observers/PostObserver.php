<?php

namespace App\Observers;

use App\Models\post;

class PostObserver
{
    public function creating(Post $post)
    {
        $slug = str()->slug($post->title);
        $originalSlug = $slug;
        $counter = 1;

        // ensure unique
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$counter++;
        }

        $post->slug = $slug;
    }

    /**
     * Handle the post "created" event.
     */
    public function created(Post $post): void {}

    /**
     * Handle the post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     */
    public function deleted(post $post): void
    {
        //
    }

    /**
     * Handle the post "restored" event.
     */
    public function restored(post $post): void
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
