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
        <div class="col-md-6 col-sm-12">
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button data-toggle="modal" data-target="#modal-category-create" type="button"><i class="fa fa-plus"></i></button>
                        </li>
                        <li>
                            <button type="button"><i class="fa fa-cog"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Product Categories</h3>
                </div>
                <div class="block-content">
                    <div class="js-tree-json"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 animated fadeIn" id="category-details" style="display: none;">
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <a id="edit-category-button"><i class="fa fa-pencil"></i></a>
                        </li>
                        <li>
                            <button type="button" id="delete-category"><i class="fa fa-trash"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title" id="category-detail-title">Category Details</h3>
                </div>
                <div class="block-content animated fadeIn" id="category-detail-body"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-category-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Create Category</h3>
                </div>
                <div class="block-content">
                    {!! Form::open(['route' => 'admin.products.categories.create', 'method' => 'POST', 'class' => 'form-horizontal push-10-t', 'id' => 'form-create-category', 'name' => 'form-create-category']) !!}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-material">
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Category Title']) !!}
                                    {!! Form::label('title', 'Title') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-material">
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Category Description']) !!}
                                    {!! Form::label('description', 'Description') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-material">
                                    {!! Form::select('parent', $category_list, null, ['class' => 'form-control']) !!}
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
                                    {!! Form::text('display_order', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
                                    {!! Form::label('display_order', 'Display Order') !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-sm btn-success" id="save-new-category" name="save-new-category" type="button" form="form-create-category" disabled>
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-category-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin">
        <div class="modal-content" id="edit-category-body"></div>
    </div>
</div>
@stop

@section('scripts')
{!! HTML::script(elixir('js/admin/pages/products/categories.js')) !!}
@stop
