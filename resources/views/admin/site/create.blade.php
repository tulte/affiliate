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
                    <form action="{{route('admin.site.save')}}" method="POST" autocomplete="off" class="sky-form" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">URL</label>
                                <label class="input">
                                    <input type="text" name="url" value=""/>
                                </label>

                                <label class="label">Meta Title</label>
                                <label class="input">
                                    <input type="text" name="meta_title" value=""/>
                                </label>

                                <label class="label">Meta Description</label>
                                <label class="input">
                                    <input type="text" name="meta_description" value=""/>
                                </label>

                                <label class="label">Meta Image</label>
                                <label for="file" class="input input-file">
                                    <div class="button"><input type="file" id="meta_image" name="meta_image" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly>
                                </label>

                                <label class="label">Background</label>
                                <label for="file" class="input input-file">
                                    <div class="button"><input type="file" id="background" name="background" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly>
                                </label>

                                <label class="label">Quotation Text</label>
                                <label class="input">
                                    <input type="text" name="quotation_text" value=""/>
                                </label>

                                <label class="label">Quotation Author</label>
                                <label class="input">
                                    <input type="text" name="quotation_author" value=""/>
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

