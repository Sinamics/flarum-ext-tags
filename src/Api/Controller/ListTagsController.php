<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sinamics\Tags\Api\Controller;

use Flarum\Api\Controller\AbstractCollectionController;
use Sinamics\Tags\Api\Serializer\TagSerializer;
use Sinamics\Tags\Tag;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class ListTagsController extends AbstractCollectionController
{
    /**
     * {@inheritdoc}
     */
    public $serializer = TagSerializer::class;

    /**
     * @var \Sinamics\Tags\Tag
     */
    protected $tags;

    /**
     * @param \Sinamics\Tags\Tag $tags
     */
    public function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }

    /**
     * {@inheritdoc}
     */
    protected function data(ServerRequestInterface $request, Document $document)
    {
        $actor = $request->getAttribute('actor');

        return $this->tags->whereVisibleTo($actor)->withStateFor($actor)->get();
    }
}
