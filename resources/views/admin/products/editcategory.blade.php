@extends('layout.admin')

@section('content')
<div class="content bg-image overflow-hidden" style="background-image: url('{{ url('img/admin/colocation.jpg') }}');">
    <div class="push-50-t push-15">
        <h1 class="h2 text-white animated zoomIn">Product Categories</h1>
        <h2 class="h5 text-white-op animated zoomIn">View and edit product categories</h2>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Edit Category</h3>
                    </div>
                    <div class="block-content">
                        {!! Form::open(['route' => ['admin.products.categories.edit', $category->id], 'method' => 'POST', 'class' => 'form-horizontal push-10-t', 'id' => 'form-edit-category', 'name' => 'form-edit-category']) !!}
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        {!! Form::text('title', $category->title, ['class' => 'form-control', 'placeholder' => 'Category Title']) !!}
                                        {!! Form::label('title', 'Title') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        {!! Form::textarea('description', $category->description_short, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Category Description']) !!}
                                        {!! Form::label('description', 'Description') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        {!! Form::select('parent', $category_list, $category->parent_id, ['class' => 'form-control']) !!}
                                        {!! Form::label('parent', 'Parent') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Options</label>
                                <div class="col-sm-6">
                                    <label class="css-input css-checkbox css-checkbox-sm css-checkbox-primary" for="hidden">
                                        <input type="checkbox" id="hidden" name="hidden" value="1"><span></span> Hide this category from users
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material">
                                        {!! Form::text('display_order', $category->display_order, ['class' => 'form-control', 'placeholder' => '0']) !!}
                                        {!! Form::label('display_order', 'Display Order') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    {!! Form::submit('Save', ['class' => 'btn btn-sm btn-success']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
{!! HTML::script(elixir('js/admin/pages/products/categories.js')) !!}
@stop
