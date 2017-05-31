@extends('layouts.admin')


@section('content')

@if ($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

            <div class="panel panel-grey">
                    <form action="{{route('admin.group.update',[$topicid, $group['id']])}}" method="POST" autocomplete="off" class="sky-form">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">Group</label>
                                <label class="input">
                                    <input type="text" name="group" value="{{$group['name']}}"/>
                                </label>

                                @foreach($group['features'] as $feature)
                                    <label class="label">{{$feature['product']}}</label>
                                    <label class="input">
                                        <input type="text" name="feature_{{$feature['productid']}}" value="{{$feature['name']}}"/>
                                    </label>
                                @endforeach

                            </section>


                        <footer>
                            <button type="submit" class="btn-u">Save</button>
                            <button type="button" class="btn-u btn-u-default" onclick="window.history.back();">Back</button>
                        </footer>
                    </form>
            </div>


@endsection
