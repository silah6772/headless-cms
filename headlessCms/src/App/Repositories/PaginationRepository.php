<?php

namespace HeadlessCms\App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class PaginationRepository
{

    public static function paginate($items, $perPage = 6, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total   ,$perPage);
    }
}
