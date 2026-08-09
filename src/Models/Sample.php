<?php

namespace ProcessMaker\Package\PackageBugReport\Models;

use ProcessMaker\Models\ProcessMakerModel;

class Sample extends ProcessMakerModel
{
    protected $table = 'users';

    protected $fillable = [
        'id', 'username', 'status',
    ];
}
