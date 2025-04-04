<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Metrics\ValueMetric;
use App\Models\User;
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
            ValueMetric::make('Orders')
            ->value(User::count()),
            ValueMetric::make('Orders')
            ->value(MoonshineUserWork::count()),
            ValueMetric::make('Orders')
            ->value(Shop::count()),
        ];
	}
}
