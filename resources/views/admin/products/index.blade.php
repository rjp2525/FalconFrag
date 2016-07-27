@extends('layout.admin')

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Products <small>View and edit products &amp; services</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Products</li>
            </ol>
        </div>
    </div>
</div>
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Products &amp; Services</h3>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th style="width: 20%;">Title</th>
                        <th class="hidden-xs" style="width: 50%;">Description</th>
                        <th class="hidden-xs" style="width: 15%;">Category</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @forelse($products as $product)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="hidden-xs">{{ $product->description_short }}</td>
                            <td class="hidden-xs text-center"><span class="label label-danger">{{ $product->category->title }}</span></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Product"><i class="fa fa-search"></i></button>
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Product"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Product"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php $i++;?>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No products are available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('scripts')
{!! HTML::script(elixir('js/admin/pages/products/index.js')) !!}
@stop
