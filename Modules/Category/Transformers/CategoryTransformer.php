<?php

namespace Modules\Category\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Category\Entities\Category;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return
            [
                'id' => $category->id,
                'name' => $category->name,
                'parent_id' => $category->parent_id,
                'type' => $category->type,
                'created_at' => $category->created_at,
                'children' => $category->children,
                'parent' => $category->parent
            ];
    }
}
