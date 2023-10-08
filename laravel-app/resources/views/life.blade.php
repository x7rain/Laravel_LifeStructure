@extends('layouts.app')
@section('title')
    My Life!
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset("/css/life.css")}}">
@endsection
@section('content')
    <div class="life-wrapper"
         @if ($life->currentBackgroundImage) style="background-image: url({{ $life->currentBackgroundImage }});" @endif>
        <div class="life-header">
            <div id="choose-life-dropdown">
                <div class="relative" data-te-dropdown-ref>
                    <button
                        class="flex items-center whitespace-nowrap rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] motion-reduce:transition-none dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        type="button"
                        id="dropdownMenuButton1"
                        data-te-dropdown-toggle-ref
                        aria-expanded="false"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        {{ $life->title ?? "New Life" }}
                        <span class="ml-2 w-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="h-5 w-5">
                <path
                    fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd"/>
                </svg>
            </span>
                    </button>
                    <ul
                        class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1"
                        data-te-dropdown-menu-ref>
                        @foreach ($lifeIds as $lifeId => $lifeTitle)
                            <li>
                                <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="{{ route('life', ['lifeId' => $lifeId]) }}"
                                    data-te-dropdown-item-ref
                                >{{$lifeTitle}}</a>
                            </li>
                        @endforeach
                        <li>
                            <button
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                onclick="Livewire.emit('openModal','new-life')"
                                data-te-dropdown-item-ref
                            >
                                > Create New Life!
                            </button>
                        </li>
                    </ul>
                </div>
                @livewire('livewire-ui-modal')
            </div>
            <div class="new-element-button">
                <button onclick="Livewire.emit('openModal','new-element')">
                    <img class="new-element-icon" src="{{asset("/images/icons/new-element.png")}}" alt="New Element" />
                </button>
            </div>
        </div>
        <div id="life-elements-container">
            @foreach($life->elements->where('element_folder_id', $life->folderId) as $element)
                <div class="life-element">
                    <button onclick="
                        @if ($element->type == 'folder')
                            location.href='{{ route('life', ['lifeId' => $life->id, 'folderId' => $element->folder->id]) }}'
                        @elseif ($element->type == 'aspect')
                            location.href='{{ route('aspect', ['aspectId' => $element->aspect->id]) }}'
                        @endif
                    ">
                        <img class="element-icon" src="{{ $element->getIcon() }}" alt="Element Icon" style="
                            width: {{ $element->getWidth() }};
                            height: {{ $element->getHeight() }};
                        "/>
                        <div class="element-title">
                            {{ $element->title }}
                        </div>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection


