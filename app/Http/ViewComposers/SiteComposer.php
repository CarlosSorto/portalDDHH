<?php

namespace App\Http\ViewComposers;

use App\Content;
use App\Cover;
use App\Page;
use Illuminate\View\View;

class SiteComposer
{
    /**
     * The content implementation.
     *
     * @var Content
     */
    protected $content;

    /**
     * The page implementation.
     *
     * @var Page
     */
    protected $page;

    /**
     * The cover implementation.
     *
     * @var Cover
     */
    protected $cover;

    /**
     * Create a new site composer.
     *
     * @param Content $content
     * @param Page    $page
     * @param Cover   $cover
     */
    public function __construct(Content $content, Page $page, Cover $cover)
    {
        $this->content  = $content;
        $this->page     = $page;
        $this->cover    = $cover;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('content', $this->content);
        $view->with('page', $this->page);
        $view->with('cover', $this->cover);
    }
}
