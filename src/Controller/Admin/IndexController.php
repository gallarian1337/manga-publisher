<?php

/**
 * @author gallarian1337
 * @email gallarian@gmail.com
 */

declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/administration', name: 'admin_index', methods: ['GET'])]
    public function __invoke(): Response
    {
        return $this->render('admin/views/index.html.twig');
    }
}
