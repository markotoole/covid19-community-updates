<?php declare(strict_types=1);

namespace App\Models;

class BlogCategory
{
    public static function getCategory($type)
    {
        $mail = config('variables.mail');
        $types = [
            'updates' => [
                'title' => 'Council updates',
                'description' => sprintf(
                    'Please let us know of other updates by emailing <a
                        href="mailto:%s">%s</a>',
                    $mail,
                    $mail
                ),
            ],
            'supports' => [
                'title' => 'Business & Community supports',
                'description' => sprintf(
                    'Please let us know if there are other supports that should be included by emailing <a
                        href="mailto:%s">%s</a>',
                    $mail,
                    $mail
                ),
            ],
        ];

        return $types[$type];
    }
}
