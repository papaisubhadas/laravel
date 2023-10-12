<p>
    @lang("Displaing all the values of :module_name (Id: :id)", ['module_name'=>ucwords($module_name_singular), 'id'=>$$module_name_singular->id]).
</p>
<table class="table table-responsive-sm table-hover table-bordered">
    <?php
    $all_columns = $$module_name_singular->getTableColumns();
    $featured_image_en = (isset($$module_name_singular) && $$module_name_singular) ? $$module_name_singular->featured_image : '';
    ?>
    <thead>
        <tr>
            <th scope="col">
                <strong>
                    @lang('Name')
                </strong>
            </th>
            <th scope="col">
                <strong>
                    @lang('Value')
                </strong>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($all_columns as $column)
        <tr>
            <td>
                <strong>

                    {{ __(label_case($column->Field)) }}
                </strong>
            </td>
            <td>

                @if($column->Field == 'image')
                    @if(!empty($image) && file_exists(public_path("frontend/image/$image")))
                    <img src="{{ url("frontend/image/$image") }}" height="150" width="200" />
                    @endif
                    
                @elseif($column->Field == 'feature_image')
                    @if(!empty($featured_image_en) && file_exists(public_path("frontend/posts/$featured_image_en")))
                    <img src="{{ url("frontend/posts/$featured_image_en") }}" height="150" width="200" />
                    @endif
                @else
                {!! show_column_value($$module_name_singular, $column) !!}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Lightbox2 Library --}}
<x-library.lightbox />
