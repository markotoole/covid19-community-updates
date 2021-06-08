<?php declare(strict_types=1);

namespace App\Models;

/**
 * Class BlogCategory.
 */
class BlogCategory
{
    /**
     * @param null $type
     *
     * @return array
     */
    public static function getCategory($type)
    {
        $types = static::getCategories();

        return $types[$type];
    }

    /**
     * @return array[]
     */
    public static function getCategories()
    {
        $mail = config('variables.mail');
        $categories = config('categories.categories', []);

        return $categories + [
            'supports' => [
                'title' => 'Government Supports',
                'description' => sprintf(
                    'Please let us know if there are other supports that should be included by emailing <a
                        href="mailto:%s">%s</a>',
                    $mail,
                    $mail
                ),
            ],
            'updates' => [
                'title' => 'Council Updates',
                'description' => sprintf(
                    'Please let us know of other updates by emailing <a
                        href="mailto:%s">%s</a>',
                    $mail,
                    $mail
                ),
            ],

        ];
    }
}
