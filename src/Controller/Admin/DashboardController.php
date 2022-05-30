<?php

namespace App\Controller\Admin;

use App\Entity\Pokemon;
use App\Entity\PokemonType;
use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pokedex Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('PokemonsTypes', 'fa fa-tags', PokemonType::class);
        yield MenuItem::linkToCrud('Pokemons', 'fa fa-tags', Pokemon::class);
        yield MenuItem::linkToCrud('Type', 'fa fa-tags', Type::class);
        yield MenuItem::linkToUrl('Back to the Pokedex','fas fa-sign-out-alt', '/');
    }
}
