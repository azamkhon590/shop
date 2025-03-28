<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoonshineUser;

use MoonShine\Resources\ModelResource;
use \MoonShine\Fields\Text;
use \MoonShine\Fields\Json;
use \MoonShine\Fields\Select;
use MoonShine\Fields\Date;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;

/**
 * @extends ModelResource<MoonshineUser>
 */
class MoonshineUserResources extends ModelResource
{
    protected string $model = MoonshineUser::class;

    protected string $title = 'MoonshineUsers';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                    Text::make("Название","full_name"),
                    Text::make("Job Title","job_title"),
                    Date::make("Work Start","work_start"),
                    Select::make('status', 'status')
                        ->options([
                            'work' => 'work',
                            'holiday' => 'holiday',
                        ]),
                    Json::make("Work_Days","work_days")
                        ->fields([
                            Text::make("Название","name"),
                            Date::make("Ссылка","work_status"),
                        ]),

                    \MoonShine\Fields\Relationships\BelongsTo::make("shop", resource: new ShopResource()),
            ]),
        ];
    }

    /**
     * @param MoonshineUser $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            "full_name" => ["nullable", "string", "min:5", "max:255" ],
            "job_title" => ["nullable", "string", "min:5", "max:255" ],
            "work_start" => ["nullable", "date" ],
            "status" => ["required", "string"],
        ];
    }
}
