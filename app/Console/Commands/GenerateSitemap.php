<?php

namespace App\Console\Commands;

use App\Entity\Blog\Category;
use App\Entity\Blog\Page;
use App\Entity\Blog\Post;
use App\Entity\Blog\Tag;
use App\Entity\Organization\Bank;
use App\Entity\Organization\Mfo;
use App\Entity\Product\CreditCard;
use App\Entity\Product\CreditCash;
use App\Entity\User\User;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';


    protected $rootPath = '/sitemap';

    protected $sitemapIndexPath = 'sitemap-index.xml';

    protected $sitemapPathes = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sitemapMap = ['Page', 'Post', 'Category', 'Tag', 'Author', 'Bank', 'Mfo', 'CreditCard', 'CreditCash'];

        foreach ($sitemapMap as $sitemapName) {
            $this->{'generate'.$sitemapName.'Sitemap'}();
        }

        $sitemapIndex = SitemapIndex::create();

        foreach ($this->sitemapPathes as $sitemapPath) {
            $sitemapIndex->add($sitemapPath);
        }

        $sitemapIndex->writeToFile(public_path($this->sitemapIndexPath));
    }


    protected function getSitemapPath($name, $counter)
    {
        $sitemapPath = $this->rootPath.'/'.$name;

        return $counter > 1 ? $sitemapPath.'_'.($counter - 1).'.xml' : $sitemapPath.'.xml' ;
    }

    protected  function saveToFile(array $tags, $sitemapPath)
    {
        $sitemap = Sitemap::create();

        foreach ($tags as $tag) {
            $sitemap->add($tag);
        }

        $sitemap->writeToFile(public_path($sitemapPath));

        $this->sitemapPathes[] = $sitemapPath;
    }


    /**
     * Generate page sitemap
     */
    protected function generatePageSitemap()
    {

        Page::public()->select(['slug', 'updated_at'])->chunk(40000, function ($pages, $counter){

            $tags = [];

            if($counter == 1){
                //Main Page
                $tags[] = Url::create('/');

                //News Page
                $tags[] = Url::create('/news');


            }

            $sitemapPath = $this->getSitemapPath('page_sitemap', $counter);



            foreach ($pages as $page) {
                $tags[] = Url::create('/'.$page->slug)->setLastModificationDate($page->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });

    }

    /**
     * Generate posts sitemap
     */
    protected function generatePostSitemap()
    {

        Post::public()->select(['slug', 'updated_at'])->chunk(40000, function ($posts, $counter){

            $sitemapPath = $this->getSitemapPath('post_sitemap', $counter);

            $tags = [];

            foreach ($posts as $post) {
                $tags[] = Url::create('/'.$post->slug)->setLastModificationDate($post->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });

    }

    /**
     * Generate category sitemap
     */
    protected function generateCategorySitemap()
    {
        Category::select(['slug', 'updated_at'])->chunk(40000, function ($categories, $counter){

            $sitemapPath = $this->getSitemapPath('category_sitemap', $counter);

            $tags = [];

            foreach ($categories as $category) {
                $tags[] = Url::create('/'.$category->getSlugPrefix().$category->slug)->setLastModificationDate($category->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

    protected function generateTagSitemap()
    {
        Tag::select(['slug', 'updated_at'])->chunk(40000, function ($tagItems, $counter){

            $sitemapPath = $this->getSitemapPath('tag_sitemap', $counter);

            $tags = [];

            foreach ($tagItems as $tagItem) {
                $tags[] = Url::create('/'.$tagItem->getSlugPrefix().$tagItem->slug)->setLastModificationDate($tagItem->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

    protected function generateAuthorSitemap()
    {
        User::select(['slug', 'updated_at'])->chunk(40000, function ($users, $counter){

            $sitemapPath = $this->getSitemapPath('author_sitemap', $counter);

            $tags = [];

            foreach ($users as $user) {
                $tags[] = Url::create('/'.$user->getSlugPrefix().$user->slug)->setLastModificationDate($user->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

    protected function generateBankSitemap()
    {
        Bank::select(['slug', 'updated_at'])->chunk(40000, function ($banks, $counter){

            $sitemapPath = $this->getSitemapPath('bank_sitemap', $counter);

            $tags = [];

            foreach ($banks as $bank) {
                $tags[] = Url::create('/'.$bank->getSlugPrefix().$bank->slug)->setLastModificationDate($bank->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

    protected function generateMfoSitemap()
    {
        Mfo::select(['slug', 'updated_at'])->chunk(40000, function ($mfos, $counter){

            $sitemapPath = $this->getSitemapPath('mfo_sitemap', $counter);

            $tags = [];

            foreach ($mfos as $mfo) {
                $tags[] = Url::create('/'.$mfo->getSlugPrefix().$mfo->slug)->setLastModificationDate($mfo->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

    protected function generateCreditCardSitemap()
    {
        CreditCard::select(['slug', 'bank_id', 'updated_at'])->chunk(40000, function ($creditCards, $counter){

            $sitemapPath = $this->getSitemapPath('credit_card_sitemap', $counter);

            $tags = [];

            foreach ($creditCards as $creditCard) {
                $tags[] = Url::create('/'.$creditCard->getSlugPrefix().$creditCard->slug)->setLastModificationDate($creditCard->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

    protected function generateCreditCashSitemap()
    {
        CreditCash::select(['slug', 'bank_id', 'updated_at'])->chunk(40000, function ($credits, $counter){

            $sitemapPath = $this->getSitemapPath('credit_cash_sitemap', $counter);

            $tags = [];

            foreach ($credits as $credit) {
                $tags[] = Url::create('/'.$credit->getSlugPrefix().$credit->slug)->setLastModificationDate($credit->updated_at);
            }

            $this->saveToFile($tags, $sitemapPath);
        });
    }

}
