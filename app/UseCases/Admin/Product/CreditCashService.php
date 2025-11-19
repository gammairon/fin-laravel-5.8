<?php
/**
 * User: Gamma-iron
 * Date: 15.05.2019
 */

namespace App\UseCases\Admin\Product;


use App\Entity\Product\CreditCash;
use App\Entity\Product\Meta\CreditCashBid;
use App\UseCases\Admin\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreditCashService extends Service
{

    public function create(array $data): ?CreditCash
    {
        $creditCash = new CreditCash( $this->getCleanData($data) );

        return $this->save($creditCash, $data);
    }

    public function update(CreditCash $creditCash, array $data): ?CreditCash
    {
        $creditCash->fill( $this->getCleanData($data) );

        return $this->save($creditCash, $data);
    }

    protected function getCleanData(array $data)
    {
        return Arr::except($data, ['documents', 'bids', 'primary_media', 'seo']);
    }

    protected function updateDocuments(CreditCash $creditCash, array $documents)
    {
        $creditCash->syncMeta('document', $documents);
    }

    protected function updateBids(CreditCash $creditCash, array $bids)
    {
        $creditCash->bids()->delete();
        $creditCash->bids()->createMany($bids);
    }

    protected function save(CreditCash $creditCash, array $data): ?CreditCash
    {
        return $this->transaction(function () use($creditCash, $data){

            $creditCash->save();

            $this->updatePrimaryPhoto($creditCash, $data);

            $this->updateDocuments($creditCash, Arr::get($data, 'documents'));

            $this->updateBids($creditCash, Arr::get($data, 'bids'));

            $creditCash->updateSeo($data);

            return $creditCash;
        });

    }

    public function deleteItems(iterable $itemIds)
    {
        return CreditCash::destroy($itemIds);
    }
}
