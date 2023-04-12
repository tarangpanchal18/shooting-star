@extends('layouts.app')

@section('title', $pageName)
@section('class', 'artistsDetailsPage')

@section('content')
<section class="bg-transparent section text-center" style="margin-top:1.5em">
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-10 col-lg-8">
                <form action="">
                <div class="row row-30">
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select class="form-control form-control-last-child" name="artist">
                                    <option value="">- Filter by Artist -</option>
                                    @foreach ($artistData as $artist)
                                    <option {{($search['artistId'] == $artist->id) ? 'selected' : ''}} value="{{$artist->id}}">{{$artist->artist_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input name="search" class="form-control form-control-last-child" type="text" name="Search" value="{{$search['keyword']}}" placeholder="Search in shop">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input style="text-align: center;border: 1px solid transparent;font-weight: 500;text-transform: capitalize;color: #fff;background: #000;" type="submit" value="Search" />
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="works text-center text-md-start mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row col-12 col-md-10">

                @forelse($pageData as $item)
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="{{asset('images/shop_item/'.$item->item_filename)}}" class="card-img-top" alt="{{$item->item_title}}">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>{{$item->item_title}}</b>
                        </a>
                        <p class="subtitle">{{$item->item_description}}</p>
                        @if ($item->artist->artist_name)
                        <p class="subtitle">By {{ $item->artist->artist_name }}</p>
                        @else
                        <p class="subtitle">&nbsp;</p>
                        @endif
                        <p class="date">£ {{number_format($item->item_price, 2)}}</p>
                        <p onclick="alert('Coming soon')" style="margin: 0px;cursor: pointer;" class="btn btn-sm btn-default">Buy Now</p>
                    </div>
                </div>
                @empty
                <div style="text-align: center;color: #839799;margin-bottom: 5em;">
                    <h4>No Data Found !</h4>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
@endsection
