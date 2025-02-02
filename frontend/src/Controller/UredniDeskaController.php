<?php

declare(strict_types=1);

namespace Celadna\Website\Controller;

use Celadna\Website\Content\Content;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class UredniDeskaController extends AbstractController
{
    public function __construct(
        private Content $contentProvider
    ) {}


    #[Route('/obecni-urad/uredni-deska', name: 'uredni_deska')]
    public function __invoke(): Response
    {
        return $this->render('uredni_deska.html.twig', [
            'uredni_desky' => $this->contentProvider->getUredniDeskyData(shouldHideIfExpired: true),
            'footer' => $this->contentProvider->getFooterData(),
        ]);
    }
}
