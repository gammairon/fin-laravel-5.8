<?php
/**
 * User: Gamma-iron
 * Date: 16.05.2019
 */

namespace App\UseCases\Admin\Product;


use App\Entity\Organization\Bank;
use App\Entity\Product\CreditCard;
use App\Entity\Product\Meta;
use App\UseCases\Admin\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreditCardService extends Service
{
    public function create(array $data): ?CreditCard
    {
        $creditCard = new CreditCard( $this->getCleanData($data) );

        return $this->save($creditCard, $data);

    }

    public function update(CreditCard $creditCard, array $data): ?CreditCard
    {
        $creditCard->fill( $this->getCleanData($data) );

        return $this->save($creditCard, $data);
    }

    protected function getCleanData(array $data)
    {
        return Arr::except($data, ['self_withdrawal_fees', 'foreign_withdrawal_fees', 'additional_fees', 'primary_media', 'documents', 'seo']);
    }

    protected function updateSelfWithdrawalFees(CreditCard $creditCard, array $fees)
    {
        $creditCard->syncMeta('self_withdrawal_fee', $fees);
    }

    protected function updateForeignWithdrawalFees(CreditCard $creditCard, array $fees)
    {
        $creditCard->syncMeta('foreign_withdrawal_fee', $fees);
    }

    protected function updateAdditionalFees(CreditCard $creditCard, array $fees)
    {
        $creditCard->syncMeta('additional_fee', $fees);
    }

    protected function updateDocuments(CreditCard $creditCard, array $documents)
    {
        $creditCard->syncMeta('document', $documents);
    }

    protected function save(CreditCard $creditCard, array $data): ?CreditCard
    {

        return $this->transaction(function () use($creditCard, $data){

            $creditCard->save();

            $this->updatePrimaryPhoto($creditCard, $data);

            $this->updateSelfWithdrawalFees($creditCard, Arr::get($data, 'self_withdrawal_fees'));

            $this->updateForeignWithdrawalFees($creditCard, Arr::get($data, 'foreign_withdrawal_fees'));

            $this->updateAdditionalFees($creditCard, Arr::get($data, 'additional_fees'));

            $this->updateDocuments($creditCard, Arr::get($data, 'documents'));

            $creditCard->updateSeo($data);

            return $creditCard;
        });

    }

    public function deleteItems(iterable $itemIds)
    {
        return CreditCard::destroy($itemIds);
    }
}
