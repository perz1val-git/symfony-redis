<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedisDemoController
{
    #[Route('/redis')]
    public function redis(): Response
    {
        $redis = new \Redis();
        $redis->connect('redis');

        $lastVisit = $redis->get('last_visit');
        if (empty($lastVisit)) {
            $lastVisit = 'never';
        }

        $now = new \DateTime('now', new \DateTimeZone("Europe/Warsaw"));

        $redis->set('last_visit', $now->format('Y-m-d H:i:s'));

        return new Response(<<<HTML
            <html>
            <body>
                <p>
                    Page last visited:
                    <strong>$lastVisit</strong>
                </p>
            </body>
            </html>
        HTML);
    }
}