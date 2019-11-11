<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        \App\Models\Product::created(function($model){
        \Log::info('Berhasil menambahkan ' .$model->name . 'Stock : ' .$model->stock . '(dari EventServiceProvider)');
    });

        \App\Models\Product::updating(function($model)
        {
            $changes = [];
            foreach($model->getDirty() as $attribute => $new)
            {
                $original = $model->getOriginal($attribute);
                if ($original != $new)
                {
                    $change = [
                        'attribute' => $attribute,
                        'from' => $original,
                        'to' => $new
                    ];
                    $changes[] = $change;
                }
            }

            if (count($changes) > 0)
            {
                \App\ProductLog::create([
                    'product_id' => $model->id,
                    'changes' => $changes
                ]);
            }

            return true;
        });
    }
}
