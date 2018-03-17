<?php

declare(strict_types=1);

/*
 * This file is part of Eloquent Viewable.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\EloquentViewable\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use CyrildeWit\EloquentViewable\Models\View;

/**
 * ProcessView class.
 *
 * @author Cyril de Wit <github@cyrildewit.nl>
 */
class ProcessView implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \CyrildeWit\EloquentViewable\Models\View
     */
    protected $view;

    /**
     * Create a new job instance.
     *
     * @param  \CyrildeWit\EloquentViewable\Models\View  $view
     * @return void
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Save the new view in the database.
        $this->view->save();
    }
}