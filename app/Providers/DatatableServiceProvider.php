<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
            $filterDateColumn = $request->filter_date_column;
            $filterDateStart = $request->filter_date_start;
            $filterDateEnd = $request->filter_date_end;

            if (!blank($searchColumns) && !blank($searchKey)) {
                $query = $query->orWhere(function ($query) use ($searchColumns, $searchKey) {
                    foreach ($searchColumns as $searchColumn) {
                        if (str_contains($searchColumn, '.')) {
                            $dir = Str::beforeLast($searchColumn, '.');
                            $dir = Str::camel($dir);
                            $col = Str::afterLast($searchColumn, '.');
                            $query = $query->orWhereHas($dir, function ($query) use ($col, $searchKey) {
                                $query->where($col, 'ILIKE', "%$searchKey%");
                            });
                        } else {
                            $query = $query->orWhere($searchColumn, 'ILIKE', "%$searchKey%");
                        }
                    }
                });
            }
            if (!blank($filterColumns) && !blank($filterKeys)) {
                $query = $query->where(function ($query) use ($filterColumns, $filterKeys) {
                    $size = count($filterColumns);
                    for ($i = 0; $i < $size; $i++) {
                        $filterColumn = $filterColumns[$i];
                        $filterKey = $filterKeys[$i];

                        if (str_contains($filterColumn, '.')) {
                            $raw = explode('.', $filterColumn);
                            $query = $query->whereHas($raw[0], function ($query) use ($raw, $filterKey) {
                                if (str_contains($filterKey, '|')) {
                                    $in = explode('|', $filterKey);
                                    $query->whereIn($raw[1], $in);
                                } else {
                                    $query->where($raw[1], $filterKey);
                                }
                            });
                        } else {
                            if (str_contains($filterKey, '|')) {
                                $in = explode('|', $filterKey);
                                $query = $query->whereIn($filterColumn, $in);
                            } else {
                                $query = $query->where($filterColumn, $filterKey);
                            }
                        }
                    }
                });
            }
            if (!blank($filterDateColumn) && (!blank($filterDateStart) || !blank($filterDateEnd))) {
                $query = $query->where(function ($query) use ($filterDateColumn, $filterDateStart, $filterDateEnd) {
                    if(!blank($filterDateStart)) {
                        $filterDateStart = Carbon::parse($filterDateStart)->toDateTimeString();
                        $query->where($filterDateColumn, '>=', $filterDateStart);
                    }
                    if(!blank($filterDateEnd)) {
                        $filterDateEnd = Carbon::parse($filterDateEnd)->toDateTimeString();
                        $query->where($filterDateColumn, '<=', $filterDateEnd);
                    }
                });
            }

            $query->orderBy($sortColumn, strtolower($sortType));
            return $query;
        });
    }
}
