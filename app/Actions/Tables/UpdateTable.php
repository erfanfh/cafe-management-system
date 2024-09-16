<?php

namespace App\Actions\Tables;

use App\Actions\Action;

class UpdateTable extends Action
{
    public function status($request, $table): void
    {
        $table->update([
            'status' => $request->status,
        ]);
    }

    public function update($request, $table): void
    {
        $table->update([
            'name' => $request->tableName,
            'status' => $request->status,
        ]);
    }
}
