<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Resources\ModelResource;
use \MoonShine\Fields\Text;
use MoonShine\Fields\Date;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Date::make("Date In", "date_in"),
                Date::make("Date Out", "date_out"),
                Switcher::make('Purchase', 'purchase'),
                \MoonShine\Fields\Relationships\BelongsTo::make("shop", resource: new ShopResource()),
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            "date_in" => ["required", "date"],
            "date_out" => ["required", "date"],
        ];
    }
}
