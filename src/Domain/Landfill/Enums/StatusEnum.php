<?php 
namespace Domain\Landfill\Enums;
 
enum StatusEnum: string
{
    
    case MODERATION = 'moderation';
    case PUBLIC = 'public';
    case CANCEL = 'cancel';
 
    public function toString(): ?string
    {
        return match ($this) {
            self::MODERATION => 'На модерации',
            self::PUBLIC => 'Опубликовано',
            self::CANCEL => 'Отменено',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::MODERATION => 'warning',
            self::PUBLIC => 'success',
            self::CANCEL => 'error',
        };
    }
}