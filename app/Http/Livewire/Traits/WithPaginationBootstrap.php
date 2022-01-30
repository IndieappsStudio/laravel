<?php

namespace App\Http\Livewire\Traits;

use Livewire\WithPagination;

trait WithPaginationBootstrap
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
}
