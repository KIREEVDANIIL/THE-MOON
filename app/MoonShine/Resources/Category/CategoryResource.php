<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Category;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\MoonShine\Resources\Category\Pages\CategoryIndexPage;
use App\MoonShine\Resources\Category\Pages\CategoryFormPage;
use App\MoonShine\Resources\Category\Pages\CategoryDetailPage;

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

/**
 * @extends ModelResource<Category, CategoryIndexPage, CategoryFormPage, CategoryDetailPage>
 */
class CategoryResource extends ModelResource implements HasImportExportContract
{
    use ImportExportConcern;

    protected string $model = Category::class;

    protected string $title = 'Categories';

    protected string $column = 'name';

    protected bool $cursorPaginate = true;

    protected bool $withPolicy = true;

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            CategoryIndexPage::class,
            CategoryFormPage::class,
            CategoryDetailPage::class,
        ];
    }

    protected function importFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Name'),
        ];
    }

    protected function exportFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Name'),
        ];
    }

    protected function import(): ?Handler
    {
        return ImportHandler::make('Import')
            ->modifyButton(
                fn(ActionButton $btn) => $btn
                ->canSee(
                    fn() => auth()->user()->moonshine_user_role_id === 1?true:false)
                );
    }

    protected function export(): ?Handler
    {
        return ExportHandler::make('Export')
            ->modifyButton(
                fn(ActionButton $btn) => $btn
                ->canSee(
                    fn() => auth()->user()->moonshine_user_role_id === 1?true:false)
                );
    }
}
