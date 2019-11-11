<?php

namespace App;

class ProducObserver
{
    public function created($model)
    {
        \Log::info('Berhasil menambah' . $model->name . 'Stock : ' . $model->stock . 'dibuat dari productOberserver');
    }
}
