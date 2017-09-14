<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Services\Menu\Sidebar;
use App\Repositories\Backend\Access\User\UserRepository;

/**
 * Class SidebarComposer.
 */
class SidebarComposer
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var \Spatie\Menu\Laravel\Menu
     */
    protected $sidebar;

    /**
     * SidebarComposer constructor.
     *
     * @param UserRepository $userRepository
     * @param Sidebar           $sidebar
     */
    public function __construct(UserRepository $userRepository, Sidebar $sidebar)
    {
        $this->userRepository = $userRepository;
        $this->sidebar = $sidebar->getMenu();
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('sidebar', $this->sidebar);
    }
}
