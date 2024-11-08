<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class DeveloperEditScreen extends Screen
{

    public $developer;

    public function query(Developer $developer): array
    {

        $developer->load('attachments');

        return [
            'developer' => $developer
        ];
    }

    public function name(): ?string
    {
        return $this->developer->exists ? 'Edit' : 'Creat';
    }

    public function description(): ?string
    {
        return "Person info";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->developer->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->developer->exists)
        ];
    }

    public function layout(): array
    {
        return [

            Layout::rows([

                Input::make('developer.nikname')
                    ->title('Nick')
                    ->placeholder('nikname'),

                Cropper::make('developer.avatar_url')
                    ->targetRelativeUrl()
                    ->title('Image generally'),

                Input::make('developer.fio')
                    ->title('Name'),

                DateTimer::make('developer.birthdate')
                    ->title('Birth date'),

                DateTimer::make('developer.experiencedate')
                    ->title('Experience start date'),

                Input::make('developer.city')
                    ->title('City'),
                
                Input::make('developer.profession')
                    ->title('Profession'),
                    
                Input::make('developer.telegram_url')
                    ->title('Telegram url'),
                    
                Input::make('developer.github_url')
                    ->title('Github url'),
                    
                Input::make('developer.email')
                    ->title('Email'),

                Quill::make('developer.education')
                    ->title('Education'),

                Quill::make('developer.content')
                    ->title('Stack')

            ])

        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->developer->fill($request->get('developer'))->save();

        Alert::info('You have successfully updated a developer.');

        return redirect()->route('platform.developer.edit', 1);
    }

}
