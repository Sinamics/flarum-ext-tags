<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sinamics\Tags\Event;

use Flarum\Core\User;
use Sinamics\Tags\Tag;

class TagWillBeSaved
{
    /**
     * @var Tag
     */
    public $tag;

    /**
     * @var User
     */
    public $actor;

    /**
     * @var array
     */
    public $data;

    /**
     * @param Discussion $discussion
     * @param User $actor
     * @param \Sinamics\Tags\Tag[] $tag
     */
    public function __construct(Tag $tag, User $actor, array $data)
    {
        $this->tag = $tag;
        $this->actor = $actor;
        $this->data = $data;
    }
}
