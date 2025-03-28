<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoonshineUserWork;

use MoonShine\Resources\ModelResource;
use MoonShine\Fields\Date;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonShineUserResource;
use \MoonShine\Fields\RelationShips\BelongsToMany;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;


/**
 * @extends ModelResource<MoonshineUserWork>
 */
class MoonshineUserWorkResource extends ModelResource
{
    protected string $model = MoonshineUserWork::class;

    protected string $title = 'MoonshineUserWorks';

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
                \MoonShine\Fields\Relationships\BelongsTo::make("moonshineUser", resource: new MoonshineUserResources()),
            ]),
        ];
    }

    /**
     * @param MoonshineUserWork $item
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
