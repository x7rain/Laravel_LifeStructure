<div class="modal w-full sm:max-w-md px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <div class="form">
        <div class="form-inner">
            <div class="form-content" id="new-element">
                <form method="post" enctype='multipart/form-data' action="{{ route('new-element') }}" id="new-element-form"
                      class="px-4">
                    @csrf
                    <div class="block mb-6 font-medium">
                        New Element
                    </div>
                    <x-input-label for="type" :value="__('Element Type')"/>
                    <select id="type" class="block mt-2 w-full border-2" name="type">
                        <option value="folder">Folder</option>
                        {{--                            todo: add options for folder(bg) and aspect(type)--}}
                        <option value="aspect">Aspect</option>
                    </select>
                    <x-input-label for="title" :value="__('Title')"/>
                    <x-text-input id="title" class="block mt-2 w-full border-2" type="text" name="title"
                                  :value="old('title')" required autofocus/>
                    <x-primary-button class="block mt-6">
                        {{ __('Create') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
