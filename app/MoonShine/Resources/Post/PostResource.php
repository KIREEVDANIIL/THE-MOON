<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Post;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\MoonShine\Resources\Post\Pages\PostIndexPage;
use App\MoonShine\Resources\Post\Pages\PostFormPage;
use App\MoonShine\Resources\Post\Pages\PostDetailPage;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Support\Enums\PageType;
use MoonShine\Crud\Handlers\Handler;
use MoonShine\ImportExport\Contracts\HasImportExportContract;
use MoonShine\ImportExport\ExportHandler;
use MoonShine\ImportExport\ImportHandler;
use MoonShine\ImportExport\Traits\ImportExportConcern;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Switcher;

/**
 * @extends ModelResource<Post>
 */
class PostResource extends ModelResource implements HasImportExportContract
{
    use ImportExportConcern;

    protected string $model = Post::class;

    protected string $title = 'Posts';

    protected string $column = 'title';

    protected bool $cursorPaginate = false; // ИЗМЕНИТЬ НА false

    protected bool $withPolicy = false;

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            PostIndexPage::class,
            PostFormPage::class,
            PostDetailPage::class,
        ];
    }

    public function getAlias(): ?string
    {
        return 'post-resource'; // ЯВНО УКАЗАТЬ ALIAS
    }

    protected function importFields(): iterable
    {
        return [
            Text::make('Title'),
            Textarea::make('Content'),
        ];
    }

    protected function exportFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Title'),
            Textarea::make('Content'),
            Text::make('Category', 'category.name'),
            Switcher::make('Is Published'),
        ];
    }

    protected function import(): ?Handler
    {
        return ImportHandler::make('Import')
            ->modifyButton(
                fn(ActionButton $btn) => $btn->canSee(fn() => true)
            );
    }

    protected function export(): ?Handler
    {
        return ExportHandler::make('Export')
            ->modifyButton(
                fn(ActionButton $btn) => $btn->canSee(fn() => true)
            );
    }
}