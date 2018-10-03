<?php

namespace Modules\Category\Repositories\Cache;

use Modules\Category\Repositories\UserRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheUserDecorator extends BaseCacheDecorator implements UserRepository
{
    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->entityName = 'category.users';
        $this->repository = $user;
    }
}
