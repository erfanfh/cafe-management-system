<?php

namespace App\Actions\Tables;

use App\Actions\Action;
use App\Models\Table;

class CreateTable extends Action
{
    public function handle($request): void
    {
        Table::create([
            'name' => $request->name,
        ]);
    }
}
