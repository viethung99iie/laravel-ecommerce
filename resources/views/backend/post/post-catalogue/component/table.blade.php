<table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" class="form-check" id="checkAll" value="">
                </th>
                <th>Thông tin nhóm thành viên</th>
                <th class="text-center"> Số lượng</th>
                <th style="width: 40%;">Ghi chú</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($postCatalogues) && is_object($postCatalogues))
                @foreach ($postCatalogues as $postCatalogue)
                        <tr>
                <td>
                    <input
                        type="checkbox"
                        value="{{$postCatalogue->id}}"
                        class="checkBoxItem"
                        id='check'
                    >
                </td>
                <td>
                    <p class="info-item name">{{$postCatalogue->name}}</p>
                </td>
                <td class=" text-center">
                    <p class="info-item quantity">{{$postCatalogue->posts_count}} người</p>
                </td>
                <td>
                    <p class="info-item description">{{$postCatalogue->description}}</p>
                </td>
                <td class="text-center">
                    <div class="ibox-content js-switch-{{$postCatalogue->id}}">
                        <input
                            type="checkbox"
                            class="js-switch status"
                            data-model='PostCatalogue'
                            data-field='publish'
                            data-modelId = '{{$postCatalogue->id}}'
                            value="{{$postCatalogue->publish}}"
                            @checked($postCatalogue->publish == 2   )
                        />
                    </div>
                </td>
                <td class="text-center">
                    <a href="{{route('post.catalogue.edit',['id'=>$postCatalogue->id] )}}" class="btn btn-success mx-2 d-inline" > <i class="fa fa-edit"></i></a>
                    <a href="{{route('post.catalogue.delete',$postCatalogue->id )}}" class="btn btn-danger" > <i class="fa fa-trash"></i></a>
                </td>
            </tr>
                @endforeach
                @endif
            </tbody>
        </table>
{{$postCatalogues->links('pagination::bootstrap-4')}}


