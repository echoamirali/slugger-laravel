<?php

namespace Echoamirali\Slugger;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Echoamirali\Slugger\Skeleton\SkeletonClass
 */
class SluggerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slugger';
    }
}
