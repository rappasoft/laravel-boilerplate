<?php

namespace App\Services\Menu;

use App\Repositories\Backend\Access\User\UserRepository;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu as LaravelMenu;

/**
 * Class Menu
 *
 * @package App\Services\Menu
 */
class Menu
{

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * Menu constructor.
     *
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function getMenu()
    {
        return LaravelMenu::new()
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
                    ) . self::pendingApproval()
                ),
                LaravelMenu::new()
                    ->addClass('treeview-menu')
                    ->add(Link::to(
                        route('admin.access.user.index'),
                        self::placeIcon(
                            'circle-o',
                            trans('labels.backend.access.users.management')
                        ) . self::pendingApproval()
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
                LaravelMenu::new()
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
     * @return string
     */
    private function pendingApproval()
    {
        if ( config('access.users.requires_approval') && $this->userRepository->getUnconfirmedCount() > 0 ) {
            return "<span class=\"label label-danger pull-right\">{$this->userRepository->getUnconfirmedCount()}</span>";
        } else {
            return "<i class=\"fa fa-angle-left pull-right\"></i>";
        }
    }
}
