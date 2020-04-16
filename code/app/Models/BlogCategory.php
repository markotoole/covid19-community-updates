<?php declare(strict_types=1);

namespace App\Models;

class BlogCategory
{
    public static function getCategory($type)
    {
        $types = [
            'updates' => [
                'title' => 'Council updates',
                'description' => 'Please let us know of other updates by emailing <a
                        href="mailto:hello@ourcelbridge.info">hello@ourcelbridge.info</a>',
            ],
            'supports' => [
                'title' => 'Business & Community supports',
                'description' => 'Please let us know if there are other supports that should be included by emailing <a
                        href="mailto:hello@ourcelbridge.info">hello@ourcelbridge.info</a>',
            ],
        ];

        return $types[$type];
    }
}
