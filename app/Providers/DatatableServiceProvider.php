<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class DatatableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('datatable', function ($request) {
            $query = $this;
            $searchColumns = blank($request->search_columns) ? [] : explode(',', $request->search_columns);
            $searchKey = $request->search_key ?? '';
            $sortColumn = $request->sort_column ?? 'created_at';
            $sortType = $request->sort_type ?? 'desc';
            $filterColumns = blank($request->filter_columns) ? [] : explode(',', $request->filter_columns);
            $filterKeys = blank($request->filter_keys) ? [] : explode(',', $request->filter_keys);

            $query = $query->orWhere(function ($query) use ($searchColumns, $searchKey, $filterColumns, $filterKeys){
                if (!blank($searchColumns)) {
                    foreach ($searchColumns as $searchColumn) {
                        if (str_contains($searchColumn, '.')) {
                            $raw = explode('.', $searchColumn);
                            $query = $query->orWhereHas($raw[0], function ($query) use ($raw, $searchKey) {
                                $query->where($raw[1], 'LIKE', "%$searchKey%");
                            });
                        } else {
                            $query = $query->orWhere($searchColumn, 'LIKE', "%$searchKey%");
                        }
                    }
                }
                if (!blank($filterColumns) && !blank($filterKeys)) {
                    $size = count($filterColumns);
                    for ($i=0; $i < $size; $i++) {
                        $filterColumn = $filterColumns[$i];
                        $filterKey = $filterKeys[$i];

                        if (str_contains($filterColumn, '.')) {
                            $raw = explode('.', $filterColumn);
                            $query = $query->orWhereHas($raw[0], function ($query) use ($raw, $filterKey) {
                                $query->where($raw[1], $filterKey);
                            });
                        } else {
                            $query = $query->orWhere($filterColumn, $filterKey);
                        }
                    }
                }
            });

            $query->orderBy($sortColumn, strtolower($sortType));
            return $query;
        });
    }
}
