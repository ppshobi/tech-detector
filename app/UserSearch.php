<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model
{
    protected $table = 'user_search';

    protected $guarded = [];

    public function storeRecentSearch($url)
    {
        if (auth()->check()) {
            $this->create([
                'user_id' => auth()->id(),
                'url' => $url
            ]);
        }
    }
}
