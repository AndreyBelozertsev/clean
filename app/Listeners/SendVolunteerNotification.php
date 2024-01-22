<?php

namespace App\Listeners;

use App\Events\VolunteerCreated;
use MoonShine\Models\MoonshineUser;
use Services\Telegram\TelegramBotApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MoonShine\Notifications\MoonShineNotification;

class SendVolunteerNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VolunteerCreated $event): void
    {
        $users = MoonshineUser::get('id')->toArray();

        MoonShineNotification::send(
            message: 'Зарегистрирован новый волонтер',
            // Опционально button
            button: ['link' => '/'. config('moonshine.route.prefix') .'/resource/volunteer-resource/detail-page?resourceItem=' . $event->volunteer->id, 'label' => 'Посмотреть'],
            // Опционально id администраторов (по умолчанию всем)
            ids: $users,
            // Опционально цвет иконки (purple, pink, blue, green, yellow, red, gray)
            color: 'green'
        );

        TelegramBotApi::sendMessage( $this->textForTelegram($event->volunteer) , env('LOGGER_TELEGRAM_CHAT_ID'), env('LOGGER_TELEGRAM_TOKEN') );
    }


    protected function textForTelegram($volunteer): string
    {
        return 'Зарегистрирован новый волонтер'
        . "\nИмя - "  . $volunteer->name
        . "\nНомер телефона - "  . $volunteer->phone
        . "\nМуниципальное образование - "  . $volunteer->city->title;
    }
}
