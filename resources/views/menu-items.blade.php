@php

$route_path = Route::current()->uri;
//dd($route->uri);
@endphp


@foreach (App\Models\ApplicationSection::orderBy('order')->get() as $section)
  @continue ($section->items->count() === 0)

  <div class="menu-item {{ $loop->first ? 'pt-0' : 'pt-5' }}">
    <div class="menu-content">
      <span class="menu-heading fw-bold text-uppercase fs-7">{{ $section->name }}</span>
    </div>
  </div>

  @foreach ($section->items()->orderBy('order')->get() as $item)
    @continue ($item->application_item_id)

    @if ($item->link)
      <div class="menu-item {{ $route_path == $item->link ? 'hover' : '' }}">
        <a class="menu-link" href="{{ url($item->link) }}">
          <span class="menu-icon">
            {!! $item->icon !!}
          </span>
          <span class="menu-title">{{ $item->name }}</span>
        </a>
      </div>
    @else
      @php
        $subitems = $item->subItems()->orderBy('order')->get();
        $add_cls = "";
        foreach ($subitems as $subitem){
          if($route_path == $subitem->link){
            $add_cls .= "hover show";
            break;
          }
        }
      @endphp


      <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{$add_cls}}">
        <span class="menu-link">
          <span class="menu-icon">
            {!! $item->icon !!}
          </span>
          <span class="menu-title">{{ $item->name }}</span>
          <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion">
          @foreach ($subitems as $subitem)
            <div class="menu-item {{ $route_path == $subitem->link ? 'hover' : '' }}">
              <a class="menu-link" href="{{ url($subitem->link) }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ $subitem->name }}</span>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  @endforeach
@endforeach
