<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Services\Menu\Menu;
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
    protected $menu;

    /**
     * SidebarComposer constructor.
     *
     * @param UserRepository $userRepository
     * @param Menu           $menu
     */
    public function __construct(UserRepository $userRepository, Menu $menu)
    {
        $this->userRepository = $userRepository;
        $this->menu = $menu->getMenu();
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('menu', $this->menu);
    }
}
