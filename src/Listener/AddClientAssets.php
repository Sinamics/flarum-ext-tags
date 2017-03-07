<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sinamics\Tags\Listener;

use Flarum\Event\ConfigureForumRoutes;
use Flarum\Event\ConfigureWebApp;
use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Event\ConfigureLocales;

class AddClientAssets
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureWebApp::class, [$this, 'addAssets']);
        $events->listen(ConfigureForumRoutes::class, [$this, 'addRoutes']);
    }
    /**
     * @param ConfigureWebApp $app
     */
    public function addAssets(ConfigureWebApp $app)
    {
        if ($app->isForum()) {
            $app->addAssets([
                __DIR__.'/../../js/forum/dist/extension.js',
                __DIR__.'/../../less/forum/extension.less'
            ]);
            $app->addBootstrapper('sinamics/tags/main');
        }

        if ($app->isAdmin()) {
            $app->addAssets([
                __DIR__.'/../../js/admin/dist/extension.js',
                __DIR__.'/../../less/admin/extension.less'
            ]);
            $app->addBootstrapper('sinamics/tags/main');
        }
    }

    /**
     * @param ConfigureForumRoutes $routes
     */
    public function addRoutes(ConfigureForumRoutes $routes)
    {
        $routes->get('/t/{slug}', 'tag');
        $routes->get('/tags', 'tags');
    }
    /**
    * Provides i18n files.
    *
    * @param ConfigureLocales $event
    */
    public function addLocales(ConfigureLocales $event)
    {
        foreach (new DirectoryIterator(__DIR__ .'/../../locale') as $file) {
            if ($file->isFile() && in_array($file->getExtension(), ['yml', 'yaml'])) {
                $event->locales->addTranslations($file->getBasename('.' . $file->getExtension()), $file->getPathname());
            }
        }
    }
}
