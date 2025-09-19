@php
    $currentUrl = request()->path();
    $itemUrl = trim($item->url, '/');
    $isActive = request()->is($itemUrl) || request()->is($itemUrl . '/*') || ($item->url == '/' && $currentUrl == '/');
@endphp

<li class="{{ $item->children->count() ? 'dropdown-menu-parrent' : '' }}">
    <a href="{{ url($item->url) }}" class="main1 {{ $isActive ? 'active' : '' }}">
        {{ $item->title }}
        @if ($item->children->count())
            <i class="fa-solid fa-angle-down"></i>
        @endif
    </a>

    @if ($item->children->count())
        @if($item->title === 'Home')
            {{-- Special mega menu for Home --}}
            <div class="tp-submenu">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-images-menu">
                            @foreach ($item->children as $child)
                                @if($loop->index < 5) {{-- First 5 items --}}
                                    <div class="homemenu-thumb" style="{{ $loop->last ? 'margin: 0 0 20px 0;' : '' }}">
                                        <div class="img1">
                                            <img src="{{ $child->image ?? 'assets/img/demo/demo'.$loop->iteration.'.jpg' }}" alt="">
                                        </div>
                                        <div class="homemenu-btn">
                                            <a class="header-btn1" target="_blank" href="{{ $child->url }}">Multi Page <i class="fa-solid fa-arrow-right"></i></a>
                                            <div class="space16"></div>
                                            <a class="header-btn1" target="_blank" href="{{ $child->single_page_url ?? $child->url }}" target="_blank">One page <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                        <a href="{{ $child->url }}" target="_blank" class="bottom-heading">{{ $child->title }}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        
                        <div class="all-images-menu">
                            @foreach ($item->children as $child)
                                @if($loop->index >= 5) {{-- Next 5 items --}}
                                    <div class="homemenu-thumb" style="{{ $loop->last ? 'margin: 0 0 20px 0;' : '' }}">
                                        <div class="img1">
                                            <img src="{{ $child->image ?? 'assets/img/demo/demo'.($loop->iteration+1).'.jpg' }}" alt="">
                                        </div>
                                        <div class="homemenu-btn">
                                            <a class="header-btn1" target="_blank" href="{{ $child->url }}">Multi Page <i class="fa-solid fa-arrow-right"></i></a>
                                            <div class="space16"></div>
                                            <a class="header-btn1" target="_blank" href="{{ $child->single_page_url ?? $child->url }}" target="_blank">One page <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                        <a href="{{ $child->url }}" target="_blank" class="bottom-heading">{{ $child->title }}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @elseif($item->title === 'Pages')
            {{-- Mega menu for Pages --}}
            <div class="mega-menu-all">
                <div class="row">
                    @foreach($item->children->chunk(4) as $chunk)
                        <div class="col-md-3">
                            <div class="mega-menu-single {{ $loop->first ? 'dis1' : '' }}">
                                <h3>{{ $chunk->first()->group ?? 'Section' }}</h3>
                                <ul>
                                    @foreach($chunk as $child)
                                        @php
                                            $childUrl = trim($child->url, '/');
                                            $childActive = request()->is($childUrl) || request()->is($childUrl . '/*');
                                        @endphp
                                        <li><a href="{{ url($child->url) }}" class="{{ $childActive ? 'active' : '' }}">{{ $child->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            {{-- Regular dropdown menu --}}
            <ul>
                @foreach ($item->children as $child)
                    @php
                        $childUrl = trim($child->url, '/');
                        $childActive = request()->is($childUrl) || request()->is($childUrl . '/*');
                    @endphp
                    
                    <li class="{{ $child->children->count() ? 'has-dropdown has-dropdown1' : '' }}">
                        <a href="{{ url($child->url) }}" class="{{ $childActive ? 'active' : '' }} main">
                            {{ $child->title }}
                            @if ($child->children->count())
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            @endif
                        </a>
                        
                        @if ($child->children->count())
                            <ul class="sub-menu">
                                @foreach ($child->children as $subchild)
                                    @php
                                        $subchildUrl = trim($subchild->url, '/');
                                        $subchildActive = request()->is($subchildUrl) || request()->is($subchildUrl . '/*');
                                    @endphp
                                    <li>
                                        <a href="{{ url($subchild->url) }}" class="{{ $subchildActive ? 'active' : '' }}">
                                            {{ $subchild->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</li>