<?php
/**
 * User: Gamma-iron
 * Date: 14.05.2019
 */

namespace App\UseCases\Admin\Organization;


use App\Entity\Organization\Bank;
use App\UseCases\Admin\Service;
use Illuminate\Support\Arr;

class BankService extends Service
{

    public function create(array $data): ?Bank
    {
        $bank = new Bank($this->getOnlyBankData($data));

        return $this->save($bank, $data);
    }

    public function update(Bank $bank, array $data): ?Bank
    {
        $bank->fill($this->getOnlyBankData($data));

        return $this->save($bank, $data);
    }

    protected function save(Bank $bank, array $data): ?Bank
    {

        return $this->transaction(function () use ($bank, $data){

            $bank->save();

            $this->updatePrimaryPhoto($bank, $data);

            $this->updateSeo($bank, $data);

            return $bank;
        });

    }

    protected function updateSeo(Bank $bank, array $data)
    {
        $bank->updateSeo($data);


        //Cards Seo
        $bank->getCardsPageSeo()->fill([
            'seoeable_id' => $bank->id,
            'seoeable_type' => Bank::CARDS_PAGE_SEO,
            'title' => Arr::get($data, 'cards_page.title'),
            'description' =>  Arr::get($data, 'cards_page.description'),
            'keywords' => Arr::get($data, 'cards_page.keywords'),
            'canonical' => route('bank.karty', $bank),
            'robot_index' => Arr::get($data, 'cards_page.robot_index', 'INDEX'),
            'robot_follow' => Arr::get($data, 'cards_page.robot_follow', 'FOLLOW'),
            'title_page' => Arr::get($data, 'cards_page.title_page'),
            'subtitle_page' => Arr::get($data, 'cards_page.subtitle_page'),
            'content_page' => Arr::get($data, 'cards_page.content_page'),
        ])->save();

        //Credits Seo
        $bank->getCreditsPageSeo()->fill([
            'seoeable_id' => $bank->id,
            'seoeable_type' => Bank::CREDITS_PAGE_SEO,
            'title' => Arr::get($data, 'credits_page.title'),
            'description' =>  Arr::get($data, 'credits_page.description'),
            'keywords' => Arr::get($data, 'credits_page.keywords'),
            'canonical' => route('bank.credity', $bank),
            'robot_index' => Arr::get($data, 'credits_page.robot_index', 'INDEX'),
            'robot_follow' => Arr::get($data, 'credits_page.robot_follow', 'FOLLOW'),
            'title_page' => Arr::get($data, 'credits_page.title_page'),
            'subtitle_page' => Arr::get($data, 'credits_page.subtitle_page'),
            'content_page' => Arr::get($data, 'credits_page.content_page'),
        ])->save();
    }

    protected function getOnlyBankData(array $data): array
    {
        return Arr::except($data, ['primary_media', 'seo', 'cards_page', 'credits_page']);
    }

    public function deleteItems(iterable $itemIds)
    {
        return Bank::destroy($itemIds);
    }

}
