<?php

namespace App\Http\Composers\Backend;

use Spatie\Menu\Link;
use Illuminate\View\View;
use Spatie\Menu\Laravel\Menu;
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
     * @var Menu
     */
    protected $menu;
    /**
     * SidebarComposer constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->menu = Menu::new()
            ->addClass('sidebar-menu')

            //General
            ->html('General', ['class'=>'header'])
            ->add(Link::to(
                route('admin.dashboard'),
                self::placeIcon('dashboard', trans('menus.backend.sidebar.dashboard'))
            ))

            //System
            ->html(trans('menus.backend.sidebar.system'), ['class'=>'header'])
            ->submenuIf(
                access()->hasRole("1"),
                Link::to(
                    '#',
                    self::placeIcon(
                        'users',
                        trans('labels.backend.access.users.management')
                    ) . '<i class="fa fa-angle-left pull-right"></i>'
                ),
                Menu::new()
                    ->addClass('treeview-menu')
                    ->add(Link::to(
                        route('admin.access.user.index'),
                        self::placeIcon(
                            'circle-o',
                            trans('labels.backend.access.users.management')
                        )
                    ))
                    ->add(Link::to(
                        route('admin.access.role.index'),
                        self::placeIcon(
                            'circle-o',
                            trans('labels.backend.access.roles.management')
                        )
                    ))
            )
            ->submenu(
                Link::to(
                    '#',
                    self::placeIcon(
                        'list',
                        trans('menus.backend.log-viewer.main')
                    ) . '<i class="fa fa-angle-left pull-right"></i>'
                ),
                Menu::new()
                    ->addClass('treeview-menu')
                    ->add(Link::to(
                        route('log-viewer::dashboard'),
                        self::placeIcon(
                            'circle-o',
                            trans('menus.backend.log-viewer.dashboard')
                        )
                    ))
                    ->add(Link::to(
                        route('log-viewer::logs.list'),
                        self::placeIcon(
                            'circle-o',
                            trans('menus.backend.log-viewer.logs')
                        )
                    ))
            )->setActive(url()->current());
    }

    /**
     * @param string $icon
     * @param string $text
     * @return string
     */

    private function placeIcon(string $icon, string $text)
    {
        return("<i class=\"fa fa-{$icon}\"></i><span>{$text}</span>");
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        if (config('access.users.requires_approval')) {
            $view->with('pending_approval', $this->userRepository->getUnconfirmedCount())->with('menu', $this->menu);
        } else {
            $view->with('pending_approval', 0)->with('menu', $this->menu);
        }
    }
}
