This solution is primarily made through the usage of the Laravel container. The magic can be found [here](https://github.com/mrhn/Abstract-PaymentGateway/blob/d66029fb837cea567910e0c2eae19617bc148964/app/Providers/AppServiceProvider.php#L31). It got tested in tinker, to see the core concepts was working.

The two places, that was suggested to implement payment gateway capture, is shown here.
- [Livewire Component](https://github.com/mrhn/Abstract-PaymentGateway/blob/main/app/Http/Livewire/CaptureOrder.php)
- [PaymentGatewayJob](https://github.com/mrhn/Abstract-PaymentGateway/blob/main/app/Jobs/CaptureOrderJob.php)

Additionally i added a command, that also showcases an higher order function approach to how it can be done.
- [CaptureStuckOrdersCommand](https://github.com/mrhn/Abstract-PaymentGateway/blob/d66029fb837cea567910e0c2eae19617bc148964/app/Console/Commands/CaptureStuckOrdersCommand.php#L31)

The fake business logic and concrete payment gateway implementations can be found [here](https://github.com/mrhn/Abstract-PaymentGateway/tree/main/app/Services/PaymentGateway).
