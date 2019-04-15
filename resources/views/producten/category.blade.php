@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment"
         style="background-image: linear-gradient(to right bottom, #fb4d3d, #ff7a26, #ffa700, #ffd300, #ffff00);">
        <div class="ui main container">
            <h1 class="ui center aligned inverted header">
                @if(!is_null($category))
                    {{ ucfirst(str_replace('-', ' ', (str_replace('', ',', $category->naam)))) }}
                @else
                    Deze categorie kan niet gevonden worden.
                @endif
            </h1>

            <p class="ui center aligned inverted header">
                {{ $products->total() }} product(en) gevonden in: {{ $category->naam }}
            </p>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui left aligned grid container">
            <div class="ui text menu">
                <div class="header item">Sorteren Op</div>
                <a class="active item">
                    Naam A-Z
                </a>
                <a class="item">
                    Naam Z-A
                </a>
                <a class="item">
                    Goedkoopste
                </a>
            </div>
            <div class="row">
                <div class="four wide left floated column">
                    <div class="ui vertical accordion menu">
                        <div class="item">
                            <a class="title">
                                <i class="dropdown icon"></i>
                                Categorie
                            </a>
                            <div class="content">
                                <div class="ui form">
                                    <div class="grouped fields">
                                        @foreach(\App\Category::all() as $categorylist)
                                            <div class="field">
                                                <a class="ui checkbox"
                                                   href="{{ route('welcome') }}/producten/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $categorylist->naam)))) }}/{{ $categorylist->id }}">
                                                    <input type="checkbox" name="size" value="small">
                                                    <label>{{ $categorylist->naam }}</label>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(\App\SubCategory::where('category_id', $category->id)->count() !== 0)
                            <div class="item">
                                <a class="active title">
                                    <i class="dropdown icon"></i>
                                    Subcategorie
                                </a>
                                <div class="active content">
                                    <div class="ui form">
                                        <div class="grouped fields">
                                            @foreach(\App\SubCategory::where('category_id', $category->id)->get() as $subcategory)
                                                <div class="field">
                                                    <a class="ui checkbox"
                                                       href="{{ route('welcome') }}/producten/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $category->naam)))) }}/{{ $category->id }}/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $subcategory->naam)))) }}/{{ $subcategory->id }}">
                                                        <input type="checkbox" name="size" value="small">
                                                        <label>{{ $subcategory->naam }}</label>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(\App\Product::where('categorie_id', $category->id)->pluck('kenmerken')->count() !== 0)
                            <div class="item">
                                <a class="title">
                                    <i class="dropdown icon"></i>
                                    Kenmerken
                                </a>
                                <div class="content">
                                    <div class="ui form">
                                        <div class="grouped fields">
                                            @foreach(\App\Product::where('categorie_id', $category->id)->pluck('kenmerken')->unique() as $kenmerk)
                                                <div class="field">
                                                    <a class="ui checkbox"
                                                       href="#">
                                                        <input type="checkbox" name="size" value="small">
                                                        <label>{{ $kenmerk }}</label>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(\App\Product::where('categorie_id', $category->id)->pluck('gewicht')->count() !== 0)
                            <div class="item">
                                <a class="title">
                                    <i class="dropdown icon"></i>
                                    Inhoud
                                </a>
                                <div class="content">
                                    <div class="ui form">
                                        <div class="grouped fields">
                                            @foreach(\App\Product::where('categorie_id', $category->id)->pluck('gewicht')->unique() as $inhoud)
                                                @if($inhoud > 0)
                                                    <div class="field">
                                                        <a class="ui checkbox"
                                                           href="#">
                                                            <input type="checkbox" name="size" value="small">
                                                            <label>{{ $inhoud }} g</label>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(\App\Product::where('categorie_id', $category->id)->pluck('aantal')->count() !== 0)
                            <div class="item">
                                <a class="title">
                                    <i class="dropdown icon"></i>
                                    Aantal
                                </a>
                                <div class="content">
                                    <div class="ui form">
                                        <div class="grouped fields">
                                            @foreach(\App\Product::where('categorie_id', $category->id)->pluck('aantal')->unique() as $aantal)
                                                @if($aantal > 0)
                                                    <div class="field">
                                                        <a class="ui checkbox"
                                                           href="#">
                                                            <input type="checkbox" name="size" value="small">
                                                            <label>{{ $aantal }} {{ \Illuminate\Support\Str::plural('stuk', $aantal) }}</label>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(\App\Product::where('categorie_id', $category->id)->pluck('oorsprong')->count() !== 0)
                            <div class="item">
                                <a class="title">
                                    <i class="dropdown icon"></i>
                                    Land van Oorsprong
                                </a>
                                <div class="content">
                                    <div class="ui form">
                                        <div class="grouped fields">
                                            @foreach(\App\Product::where('categorie_id', $category->id)->pluck('oorsprong')->unique() as $oorsprong)
                                                <div class="field">
                                                    <a class="ui checkbox"
                                                       href="#">
                                                        <input type="checkbox" name="size" value="small">
                                                        <label>{{ $oorsprong }}</label>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="eleven wide column">
                    <div class="ui three stackable cards">
                        @foreach($products as $product)
                            <div class="card product-card">
                                <div class="blurring dimmable image">
                                    <div class="ui dimmer">
                                        <div class="content">
                                            <div class="center">
                                                <a class="ui inverted button"
                                                   href="{{ route('welcome') }}/product/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $product->naam)))) }}/{{ $product->ean }}">Bekijken</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ $product->foto }}" alt="{{ $product->naam }}">
                                </div>
                                <div class="content">
                                    <a class="header"
                                       href="{{ route('welcome') }}/product/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $product->naam)))) }}/{{ $product->ean }}">{{ $product->naam }}</a>
                                    <div class="meta">
                                        <span class="category">
                                            @if($product->gewicht > 0) {{$product->gewicht}} g
                                            @elseif($product->aantal > 0) {{$product->aantal}} {{ \Illuminate\Support\Str::plural('stuk', $product->aantal) }} @endif
                                        </span>
                                        <span class="right floated time"><strong>&euro; {{ str_replace('.', ',', $product->prijs) }}</strong></span>
                                    </div>
                                </div>
                                <div class="extra content">
                                    @if($product->kenmerken == 'Biologisch')
                                        <span class="left floated ui circular mini label hint--top hint--rounded"
                                              aria-label="Biologisch">
                                        <img src="{{ asset('images/icons/bio.svg') }}" height="15" width="15"
                                             align="Biologisch">
                                        </span>
                                    @elseif($product->kenmerken == 'Vegan')
                                        <span class="left floated ui circular mini label hint--top hint--rounded"
                                              aria-label="Veganistisch">
                                        <img src="{{ asset('images/icons/vegan.svg') }}" height="15" width="15"
                                             align="Vegan">
                                        </span>
                                    @elseif($product->kenmerken == 'Biologisch & Vegan')
                                        <span class="left floated ui circular mini label hint--top hint--rounded"
                                              aria-label="Biologisch">
                                        <img src="{{ asset('images/icons/bio.svg') }}" height="15" width="15"
                                             align="Vegan">
                                        </span>
                                        <span class="left floated ui circular mini label hint--top hint--rounded"
                                              aria-label="Veganistisch">
                                        <img src="{{ asset('images/icons/vegan.svg') }}" height="15" width="15"
                                             align="Vegan">
                                        </span>
                                    @endif
                                    <span class="right floated star">
                                        <i class="plus icon"></i>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="ui center aligned">
                            {{ $products->links('vendor.pagination.semantic-ui') }}
                        </div>
                        @if($products == '[]')
                            <div class="card">
                                <div class="ui tiny centered image">
                                    <img src="{{ asset('images/icons/no-photo.png') }}">
                                </div>
                                <div class="content">
                                    <a class="header center aligned">Geen producten gevonden</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
