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
                    <form action="{{route('admin.info.update',[$info->id])}}" method="POST" autocomplete="off" class="sky-form">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">Header</label>
                                <label class="input">
                                    <input type="text" name="header" value="{{$info->header}}"/>
                                </label>

                                <label class="label">Text</label>
                                <label class="input">
                                    <textarea rows="10" cols="105" name="text">{{$info->text}}</textarea>
                                </label>

                                <label class="label">Topic</label>
                                <label class="input">
                                    {!! Form::select('topic', $topics, $info->topic_id, ['class' => 'form-control']) !!}
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
