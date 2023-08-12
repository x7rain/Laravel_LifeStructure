<div class="modal w-full sm:max-w-md px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <div class="form" >
        <div class="form-inner">
                <div class="form-content" id="new-life">
                    <form method="post" enctype='multipart/form-data' action="{{ route('new-life') }}" id="new-life-form" class="px-4">
                        @csrf
                        <div class="block mb-6 font-medium">
                            New Life
                        </div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-2 w-full border-2" type="text" name="title" :value="old('title')" required autofocus />
                        </h3>
                        <div class="mt-4">
                            <x-input-label for="background_image" :value="__('Background Image (not required)')" />
                            <input id="background_image" class="relative m-0 mt-2 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                   type="file"
                                   name="background_image"
                                   accept="image/*"
                                   autofocus />
                        </div>
                            <x-primary-button class="block mt-6">
                                {{ __('Create') }}
                            </x-primary-button>
                        </h3>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');
            $('ul.tabs li').removeClass('current');
            $('.form-content').removeClass('current');
            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })
    </script>
</div>
