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
                    <form action="{{route('admin.product.update',[$product->id])}}" method="POST" autocomplete="off" class="sky-form">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">Name</label>
                                <label class="input">
                                    <input type="text" name="name" value="{{$product->name}}"/>
                                </label>

                                <label class="label">Link</label>
                                <label class="input">
                                    <input type="text" name="link" value="{{$product->link}}"/>
                                </label>

                                <label class="label">Identifier</label>
                                <label class="input">
                                    <input type="text" name="identifier" value="{{$product->identifier}}"/>
                                </label>

                                <label class="label">Topic</label>
                                <label class="input">
                                    {!! Form::select('topic', $topics, $product->topic_id, ['class' => 'form-control']) !!}
                                </label>
                            </section>
                        </fieldset>


                        <footer>
                            <button type="submit" class="btn-u">Save</button>
                            <button type="button" class="btn-u btn-u-default" onclick="window.history.back();">Back</button>
                        </footer>
                    </form>
            </div>


@endsection
