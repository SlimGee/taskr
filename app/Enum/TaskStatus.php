<?php

namespace App\Enum;

enum TaskStatus: string
{
    case COMPLETED = 'completed';
    case IN_PROGRESS = 'in_progress';
    case PENDING = 'pending';

    public function label(): string
    {
        return match ($this) {
            self::COMPLETED => 'Completed',
            self::IN_PROGRESS => 'In Progress',
            self::PENDING => 'Pending',
        };
    }

    public function classes(): string
    {
        return match ($this) {
            self::COMPLETED => 'py-1 px-2 uppercase text-xs font-semibold leading-none bg-green-700 text-green-100 rounded focus:outline-none',
            self::IN_PROGRESS => 'py-1 px-2 uppercase text-xs font-semibold leading-none bg-indigo-700 text-indigo-100 rounded focus:outline-none',
            self::PENDING => 'py-1 px-2 uppercase text-xs font-semibold leading-none bg-slate-700 text-slate-100 rounded focus:outline-none'
        };
    }
}
