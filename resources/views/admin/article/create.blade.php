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
                    <form action="{{route('admin.article.save')}}" method="POST" autocomplete="off" class="sky-form" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">Header</label>
                                <label class="input">
                                    <input type="text" name="header"/>
                                </label>

                                <label class="label">Text</label>
                                <label class="input">
                                    <textarea rows="10" cols="105" id="text" name="text"></textarea>
                                </label>

                                <label class="label">Image</label>
                                <label for="file" class="input input-file">
                                    <div class="button"><input type="file" id="image" name="image" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly>
                                </label>


                                <label class="label">Topic</label>
                                <label class="input">
                                    {!! Form::select('topic', $topics, null, ['class' => 'form-control']) !!}
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
    $('#text').summernote();
});

</script>

@endsection

