<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;
use Livewire\WithPagination;

trait WithPaginationBootstrap
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
}
