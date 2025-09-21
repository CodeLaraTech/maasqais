@php
    $currentUrl = request()->path();
    $itemUrl = trim($item->url, '/');
    $isActive = request()->is($itemUrl) || request()->is($itemUrl . '/*') || ($item->url == '/' && $currentUrl == '/');
@endphp

<li class="menu_item h-full relative {{ $item->children->count() ? 'has-children' : '' }}">
    <a href="{{ url($item->url) }}"
       class="menu_link inline-flex items-center gap-1 h-full text-white {{ $isActive ? 'active' : '' }}">
        <span class="has_line line_red txt-button">{{ $item->title }}</span>
        @if($item->children->count())
            <span class="ph-bold ph-caret-down mt-0.5 text-xs"></span>
        @endif
    </a>

    {{-- Dropdowns / Mega Menu --}}
    @if($item->children->count())

        {{-- Example: Services (Mega Menu) --}}
        @if(strtolower($item->title) === 'services')
            <div
                class="menu_sub menu_sub_mega invisible fixed top-[6.25rem] right-0 left-0 translate-y-5 opacity-0 pointer-events-none duration-400">
                <div class="container">
                    <ul class="services_list grid grid-cols-3 gap-4 w-full p-8 border-t border-outline bg-white">
                        @foreach($item->children as $child)
                            <li class="services_item">
                                <a href="{{ url($child->url) }}"
                                   class="services_link flex gap-5 py-4 px-5 border border-outline hover:bg-red hover:bg-opacity-10 hover:border-red duration-300 group">
                                    @if(!empty($child->icon))
                                        <span class="{{ $child->icon }} flex-shrink-0 text-5xl duration-300 group-hover:text-red"></span>
                                    @endif
                                    <div class="services_info">
                                        <strong class="services_tit heading6 group-hover:text-red duration-300">
                                            {{ $child->title }}
                                        </strong>
                                        @if(!empty($child->description))
                                            <p class="services_desc mt-1 caption1 text-variant1 text-ellipsis line-clamp-2">
                                                {{ $child->description }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        {{-- Standard Dropdown --}}
        @else
            <ul
                class="menu_sub invisible absolute top-full -left-6 min-w-[13.75rem] p-3 border-t border-outline bg-white translate-y-5 opacity-0 pointer-events-none shadow duration-400">
                @foreach($item->children as $child)
                    @php
                        $childUrl = trim($child->url, '/');
                        $childActive = request()->is($childUrl) || request()->is($childUrl.'/*');
                    @endphp
                    <li class="menu_sub_item">
                        <a href="{{ url($child->url) }}"
                           class="menu_sub_link block px-3 py-[0.875rem] txt-button hover:bg-red hover:bg-opacity-10 hover:text-red duration-300 {{ $childActive ? 'active' : '' }}">
                            {{ $child->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</li>
