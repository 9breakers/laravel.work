<?php
namespace App\Filters;

class PostFilter extends QueryFilter
{
public function applyFilters()
{
$this->category_id(request('category_id'));
$this->tags(request('tags'));
$this->minPrice(request('minPrice'));
$this->maxPrice(request('maxPrice'));
}

public function category_id($id = null)
{
if (!is_null($id)) {
$this->builder->where('category_id', $id);
}
}

public function tags($tags = null)
{
if (!is_null($tags)) {
if (!is_array($tags)) {
$tags = explode(',', $tags);
}
$this->builder->whereHas('tags', function ($query) use ($tags) {
$query->whereIn('tags.id', $tags);
}, '=', count($tags));
}
}

public function minPrice($value = null)
{
if (!is_null($value)) {
$this->builder->where('price', '>=', $value);
}
}

public function maxPrice($value = null)
{
if (!is_null($value)) {
$this->builder->where('price', '<=', $value);
}
}
}
