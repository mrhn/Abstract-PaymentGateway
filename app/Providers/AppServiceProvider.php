<?php

namespace App\Providers;

use App\Models\Order;
use App\Services\PaymentGateway\GatewayService;
use App\Services\PaymentGateway\Implementations\MobilePayGateway;
use App\Services\PaymentGateway\Implementations\QuickPayGateway;
use App\Services\PaymentGateway\PaymentGatewayService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Order::GATEWAY_MOBILEPAY, function () {
            /** @var MobilePayGateway $mobilePayGateway */
            $mobilePayGateway = resolve(MobilePayGateway::class);
            return new PaymentGatewayService(
                $mobilePayGateway->setApiKey(env('MOBILEPAY_API_KEY'))
                    ->setApiSecret(env('MOBILEPAY_API_SECRET'))
            );
        });

        $this->app->bind(Order::GATEWAY_QUICKPAY, function () {
            /** @var QuickPayGateway $quickPayGateway */
            $quickPayGateway = resolve(QuickPayGateway::class);
            return new PaymentGatewayService(
                $quickPayGateway->setApiToken(env('QUICKPAY_API_TOKEN'))
            );
        });
    }
}
