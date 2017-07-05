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
                    <form action="{{route('admin.product.update',[$product->id])}}" method="POST" autocomplete="off" class="sky-form" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                        <fieldset>
                            <section>
                                <label class="label">Topic</label>
                                <label class="input">
                                    {!! Form::select('topic', $topics, $product->topic_id, ['class' => 'form-control']) !!}
                                </label>

                                <label class="label">Name</label>
                                <label class="input">
                                    <input type="text" name="name" value="{{$product->name}}"/>
                                </label>


                                <label class="label">Provider</label>
                                <label class="input">
                                    <input type="text" name="provider" value="{{$product->provider}}"/>
                                </label>

                                <label class="label">Link</label>
                                <label class="input">
                                    <input type="text" name="link" value="{{$product->link}}"/>
                                </label>

                                <label class="label">Image</label>
                                <label for="file" class="input input-file">
                                    <div class="button"><input type="file" id="image" name="image" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly>
                                </label>

                                <label class="label">Identifier</label>
                                <label class="input">
                                    <input type="text" name="identifier" value="{{$product->identifier}}"/>
                                </label>

                                <label class="label">Price</label>
                                <label class="input">
                                    <input type="text" name="price" value="{{$product->price}}"/>
                                </label>

                                <label class="label">Review Count</label>
                                <label class="input">
                                    <input type="text" name="review_count" value="{{$product->review_count}}"/>
                                </label>

                                <label class="label">Review Value</label>
                                <label class="input">
                                    <input type="text" name="review_value" value="{{$product->review_value}}"/>
                                </label>

                                <div class="form-section-line"></div>

                                <label class="label">Groups</label>
                                <div class="multifield-wrapper">
                                    <div class="multifields">
                                        @foreach($product->groups as $product_group)
                                            <div class="multifield form-group">
                                                <div class="inline-block">
                                                    {!! Form::select('group_id[]', $groups, $product_group->id, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="inline-block">
                                                    {!! Form::select('group_type[]', $group_types, $product_group->pivot->type, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="inline-block">
                                                    <input type="text" name="group_value[]" class="form-control" value="{{$product_group->pivot->value}}"/>
                                                </div>
                                                <div class="inline-block">
                                                    <a href="#" class="multifield-remove"><i class="fa big-icon fa-remove"></i></a>
                                                </div>
                                                <div class="inline-block">
                                                    <a href="#" class="multifield-add"><i class="fa big-icon fa-plus"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-section-line"></div>

                                <label class="label">Attributes</label>
                                <div class="multifield-wrapper">
                                    <div class="multifields">
                                        @foreach($product->attributes as $attribute)
                                            <div class="multifield form-group">
                                                <div class="inline-block">
                                                    {!! Form::select('attribute_type[]', $group_types, $attribute->type, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="inline-block">
                                                    <input type="text" name="attribute_value[]" class="form-control" value="{{$attribute->value}}"/>
                                                </div>
                                                <div class="inline-block">
                                                    <a href="#" class="multifield-remove"><i class="fa big-icon fa-remove"></i></a>
                                                </div>
                                                <div class="inline-block">
                                                    <a href="#" class="multifield-add"><i class="fa big-icon fa-plus"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


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

<script type="text/javascript" src="/js/multifield.js"></script>

@endsection


