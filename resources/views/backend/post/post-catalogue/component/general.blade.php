<div class="row mb15">
    <div class="col-lg-12">
        <label for="" class="control-label text-left">
                Tiêu đề nhóm bài viết<span class="text-danger">(*)</span>
        </label>
        <input
                type="text"
                name="name"
                value="{{old('name',($postCatalogue->name) ?? '')}} "
                class="form-control"
                autocomplete="off"
            >
    </div>
</div>
<div class="row mb15">
    <div class="col-lg-12">
        <label for="" class="control-label text-left">
                Mô tả ngắn<span class="text-danger">(*)</span>
        </label>
        <textarea
                type="text"
                name="description"
                value="{{old('description',($postCatalogue->description) ?? '')}} "
                class="form-control ck-editor"
                id= 'description'
                autocomplete="off"
                data-height= "150"
            ></textarea>
    </div>
</div>
<div class="row mb15">
    <div class="col-lg-12">
        <label for="" class="control-label text-left">
                Nội dung<span class="text-danger">(*)</span>
        </label>
        <textarea
                type="text"
                name="content"
                value="{{old('content',($postCatalogue->content) ?? '')}} "
                class="form-control ck-editor"
                id= 'content'
                autocomplete="off"
                data-height= "400"
            ></textarea>
    </div>
</div>
