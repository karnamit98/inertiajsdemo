<?php 


/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
function paginate($items, $perPage = 5, $page = null, $options = [])
{
    $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
    $paginator = new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    return $paginator;
    // dd( $paginator );
    // return str_replace( '/?', url()->current(), $paginator);

}