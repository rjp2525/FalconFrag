<div class="block block-themed block-transparent remove-margin-b">
    <div class="block-header bg-primary-dark">
        <ul class="block-options">
            <li>
                <button data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
            </li>
        </ul>
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
        {!! Form::close() !!}
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
    <button class="btn btn-sm btn-success" id="save-edit-category" name="save-edit-category" type="button" form="form-edit-category">
        <i class="fa fa-check"></i> Save
    </button>
</div>
