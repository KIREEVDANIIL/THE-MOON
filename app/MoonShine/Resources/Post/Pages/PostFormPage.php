<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Post\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use App\MoonShine\Resources\Post\PostResource;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Hidden;

/**
 * @extends FormPage<PostResource>
 */
class PostFormPage extends FormPage
{
    protected function fields(): iterable
    {
        return [
            Hidden::make('Moonshine User ID', 'moonshine_user_id')
                ->setValue(auth()->id()),
                
            Text::make('Заголовок', 'title')
                ->required(),
                
            Textarea::make('Содержание', 'content')
                ->required(),
                
            Select::make('Категория', 'category_id')
                ->options(
                    \App\Models\Category::pluck('name', 'id')->toArray()
                )
                ->required()
                ->searchable(), // Добавляем поиск если категорий много
                
            Image::make('Изображение', 'image')
                ->disk('public')
                ->dir('posts')
                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif'])
                ->removable(),
                
            Text::make('Slug', 'slug')
                ->required(),
                
            Switcher::make('Опубликовано', 'is_published')
                ->default(true),
        ];
    }

    protected function rules($item): array
    {
        return [
            'moonshine_user_id' => 'required|exists:moonshine_users,id',
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:10',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'is_published' => 'boolean',
        ];
    }
}