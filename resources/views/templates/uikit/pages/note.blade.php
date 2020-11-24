@extends('templates.uikit/app')

@section('title')
{{ env('APP_NAME') }} {{ $data['note_name'] }}
@endsection

@section('content')
<form method="post" action="{{ route('actions_update_post') }}">
    @csrf
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">
            <i class="cursor-pointer uk-icon" uk-icon="icon: lock" uk-tooltip="Private note"></i>
            <i class="cursor-pointer uk-icon uk-text-warning uk-badge uk-padding-small uk-padding-remove-horizontal uk-padding-remove-vertical" uk-icon="icon: bolt" uk-tooltip="New note"></i>
            <span class="uk-margin-small-left">
                {{ $data['note_name'] }}
                <i class="cursor-pointer uk-icon" uk-icon="icon: pencil" uk-tooltip="Edit title"></i>
            </span>
        </legend>

        {{--  <div class="uk-margin">
            <input class="uk-input" type="text"
            name="note_description"
            value="{{ $data['note_description'] }}"
            placeholder="Note description"
            spellcheck="false"
            >
        </div>  --}}
        
        <div class="uk-text-center uk-margin-small-bottom uk-grid" uk-grid="">
            <div class="uk-width-5-6 uk-first-column">
                <input class="uk-input uk-width-1-1" type="text"
                    name="note_description"
                    title="Note title"
                    placeholder="Note title"
                    value="{{ $data['note_description'] }}"
                    spellcheck="false"
                >
            </div>
            <div class="uk-width-1-6 uk-padding-remove-left">
                <div class="uk-flex uk-flex-between">
                    <button class="mod-mobile uk-button uk-button-primary uk-width-1-1" title="Update title" uk-tooltip="Update title">
                        <i uk-icon="icon: check; ratio: 1.5"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-text-center uk-margin-small-bottom uk-grid uk-margin-remove-top" uk-grid="">
            <div class="uk-width-5-6 uk-first-column">
                <input class="uk-input uk-width-1-1" type="text" placeholder="Note slug" title="Note slug">
            </div>
            <div class="uk-width-1-6 uk-padding-remove-left">
                <div class="uk-flex uk-flex-between">
                    <button class="mod-mobile uk-button uk-button-primary uk-width-1-1" title="Update slug" uk-tooltip="Update slug">
                        <i uk-icon="icon: check; ratio: 1.5"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <style>
                pre.ace_editor{
                    min-height: 25rem !important;
                    margin-top: 0.2rem !important;
                }
            </style>
            
            <div class="uk-width-1-1 uk-first-column">
                <button class="mod-mobile uk-button uk-button-small uk-text-danger" type="button" onclick="editorDecreaseFontSize()" uk-tooltip="Decrease font size">
                    <i class="uk-icon" uk-icon="icon: minus-circle"></i>
                </button>
                <button class="mod-mobile uk-button uk-button-small uk-text-danger" type="button" onclick="resetFontSize()" uk-tooltip="Reset font size">
                    <i class="uk-icon" uk-icon="icon: close"></i>
                </button>
                <button class="uk-margin-right mod-mobile uk-button uk-button-small uk-text-danger" type="button" onclick="editorIncreaseFontSize()" uk-tooltip="Increase font size">
                    <i class="uk-icon" uk-icon="icon: plus-circle"></i>
                </button>

                <button class="uk-margin-left mod-mobile uk-button uk-button-small uk-text-danger" type="button" onclick="editorUndo()" uk-tooltip="Undo">
                    <i class="uk-icon" uk-icon="icon: history"></i>
                </button>
                <button class="mod-mobile uk-button uk-button-small uk-text-danger" type="button" onclick="editorRedo()" uk-tooltip="Redo">
                    <i class="uk-icon" uk-icon="icon: future"></i>
                </button>
            </div>

            {{--  <textarea class="uk-textarea" rows="5" name="note_content" placeholder="Textarea" spellcheck="false">{{ $data['note_content'] }}</textarea>  --}}
            <textarea class="uk-textarea" rows="5" name="note_content" placeholder="Textarea" spellcheck="false"  id="editor">{{ $data['note_content'] }}</textarea>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid uk-flex uk-flex-wrap-middle">
            <div class="uk-width-2-3@m uk-first-column uk-padding-small uk-padding-remove-bottom">
                <label class="cursor-pointer" title="Note visibility private" uk-tooltip="Note visibility private">
                    <input class="uk-radio" type="radio" value="private" name="note_visibility" checked>
                    <i uk-icon="icon: lock; ratio: 1"></i> Private (current)
                </label>
                <label class="cursor-pointer" title="Note visibility public" uk-tooltip="Note visibility public">
                    <input class="uk-radio" type="radio" value="public" name="note_visibility">
                    <i uk-icon="icon: lock; ratio: 1"></i> Public
                </label>
            </div>
            <div class="uk-width-1-3@m">
                <div class="uk-form-controls cursor-pointer">
                    <select class="uk-select cursor-pointer" id="form-stacked-select" title="Note syntax" uk-tooltip="Note syntax" onchange="editorSetLang(this.value)">
                        <option value="plain_text">Plain text (current)</option>
                        <option value="php">PHP (selected)</option>
                        <option value="javascript">JavaScript</option>
                        <option value="sh">Shell Script</option>
                        <option value="scss">SCSS</option>
                        <option value="css">CSS</option>
                        <option value="sql">SQL</option>
                    </select>
                </div>
            </div>
        </div>        

        <div class="uk-active">
            <div class="uk-flex uk-flex-column uk-width-1-1">
                
                <div class="uk-flex uk-flex-between">
                    <button class="mod-mobile uk-button uk-button-small uk-button-danger uk-width-1-6" title="Delete" uk-tooltip="Delete">
                        <i uk-icon="icon: trash; ratio: 1.5"></i>
                    </button>
                    
                    <button class="mod-mobile uk-button uk-button-secondary uk-width-1-6" title="Restore back state" uk-tooltip="Restore back state">
                        <i uk-icon="icon: history; ratio: 1.5"></i>
                    </button>

                    <button class="mod-mobile uk-button uk-button-primary uk-button-small uk-width-1-6" title="Save note" uk-tooltip="Save note">
                        <i uk-icon="icon: check; ratio: 1.5"></i>
                    </button>
                </div>
            </div>
        </div>

    </fieldset>
</form>
@endsection
