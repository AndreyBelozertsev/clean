<?php

namespace App\Listeners;

use App\Events\LandfillCreated;
use MoonShine\Models\MoonshineUser;
use Services\Telegram\TelegramBotApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MoonShine\Notifications\MoonShineNotification;

class SendLandfillNotification
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
    public function handle(LandfillCreated $event): void
    {
        $users = MoonshineUser::get('id')->toArray();

        MoonShineNotification::send(
            message: 'Добавлена новая свалка',
            // Опционально button
            button: ['link' => '/'. config('moonshine.route.prefix') .'/resource/landfill-resource/detail-page?resourceItem=' . $event->landfill->id, 'label' => 'Посмотреть'],
            // Опционально id администраторов (по умолчанию всем)
            ids: $users,
            // Опционально цвет иконки (purple, pink, blue, green, yellow, red, gray)
            color: 'green'
        );

        TelegramBotApi::sendMessage( $this->textForTelegram($event->landfill) , env('LOGGER_TELEGRAM_CHAT_ID'), env('LOGGER_TELEGRAM_TOKEN') );
    }


    protected function textForTelegram($landfill): string
    {
        return 'Добавлена новая свалка'
        . "\nАдрес - "  . $landfill->address
        . "\nМуниципальное образование - "  . $landfill->city->title
        . "\nОписание - "  . $landfill->content
        . "\nИмя заявителя - "  . $landfill->name
        . "\nТелефон заявителя - "  . $landfill->phone
        . "\nКоординаты - "  . $landfill->coordinates;
    }
}
