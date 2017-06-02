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
                    <form action="{{route('admin.topic.save')}}" method="POST" autocomplete="off" class="sky-form">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">Name</label>
                                <label class="input">
                                    <input type="text" name="name" value=""/>
                                </label>

                                <label class="label">Intro</label>
                                <label class="input">
                                    <textarea rows="10" cols="105" id="intro" name="intro"></textarea>
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

@section('scripts')

<script type="text/javascript">

$(function() {
    $('#intro').summernote();
});

</script>

@endsection
