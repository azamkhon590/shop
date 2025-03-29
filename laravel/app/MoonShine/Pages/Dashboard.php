<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Metrics\ValueMetric;
use App\Models\User;
use App\Models\MoonshineUser;
use App\Models\MoonshineUserWork;
use App\Models\Shop;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            ValueMetric::make('MoonshineUsers')
            ->value(MoonshineUser::count()),
            ValueMetric::make('Works')
            ->value(MoonshineUserWork::count()),
            ValueMetric::make('Shops')
            ->value(Shop::count()),
            ValueMetric::make('Users')
            ->value(User::count()),
        ];
	}
}
