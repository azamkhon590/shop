<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

use MoonShine\Fields\ID;
use MoonShine\Resources\ModelResource;
use \MoonShine\Fields\Text;
use MoonShine\Fields\Date;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;

/**
 * @extends ModelResource<Shop>
 */
class ShopResource extends ModelResource
{
    protected string $model = Shop::class;

    protected string $title = 'Shops';

    protected string $column = 'name';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make("Название","name"),
                Text::make("Description","description")->nullable(),
                Text::make("Address","address")->nullable(),
                Date::make("Work Time","work_time")->nullable(),
                Text::make("Телефон","phone")->mask("+7 999 999-99-99")->nullable(),
                Text::make("Почта","email")->nullable(),
            ]),
        ];
    }

    /**
     * @param Shop $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            "name" => ["required", "string", "min:5", "max:255"], 
            "description" => ["nullable", "string", "min:5", "max:255"],
            "phone" => ["nullable", "string", "min:11", "max:20"],
            "email" => ["nullable", "string", "min:5", "max:255"],
            "address" => ["nullable", "string", "min:5", "max:255"],
            "work_time" => ["nullable", "date"],
        ];
    }
}
