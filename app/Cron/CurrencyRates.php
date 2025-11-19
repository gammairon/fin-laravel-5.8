<?php
/**
 * User: Gamma-iron
 * Date: 14.02.2020
 */

namespace App\Cron;


use App\Entity\CurrencyRate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CurrencyRates
{
    private static $attempt = 0;

    public function run()
    {
        try{
            self::$attempt++;
            $this->updateCurrencyRates();
        }catch (\Exception $e){
            if(self::$attempt <= 3)
                $this->run();
            else
                Log::error('Не удалось получить Курсы Валют!!!');
        }
    }

    protected function updateCurrencyRates()
    {
        $rates = $this->getCurrencyRates();

        foreach ($rates as $cc => $rate){
            $currencyRate = CurrencyRate::whereCc($cc)->first();

            $currencyRate->update([
                'txt' => $rate->txt,
                'exchangedate' => $rate->exchangedate,
                'old_rate' => $currencyRate->new_rate,
                'new_rate' => $rate->rate,
            ]);
        }
    }

    protected function getCurrencyRates(): array
    {
        $rates = [];
        //
        $currencyRates = collect(json_decode(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?date='.Carbon::now()->format('Ymd').'&json')));

        foreach (CurrencyRate::$currencyCodes as $cc){
            $rates[$cc] = $currencyRates->where('cc', '=', $cc)->first();
        }

        return $rates;
    }
}
