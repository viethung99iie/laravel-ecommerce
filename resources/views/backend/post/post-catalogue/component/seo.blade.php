<div class="ibox">
                    <div class="ibox-title">
                        <h5>Cấu hình SEO</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="seo-container">
                            <h3 class="meta-title">
                                Bạn chưa nhập tiêu đề
                            </h3>
                            <div class="meta-canonical">
                                http:duong-dan-cua-ban.com
                            </div>
                            <div class="meta-description">
                                 Bạn chưa nhập mô tả cho đường dẫn
                            </div>
                        </div>
                        <div class="seo-wrapper">
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span>Tiêu đề SEO</span>
                                                <span class="count_meta-title">0 ký tự</span>
                                            </div>
                                        </label>
                                        <input
                                                type="text"
                                                name="meta_title"
                                                value="{{old('meta_description',($postCatalogue->meta_description) ?? '')}} "
                                                class="form-control"
                                                autocomplete="off"
                                            >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">
                                            Từ khóa SEO
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
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span>Mô tả SEO</span>
                                                <span class="count_meta-description">0 ký tự</span>
                                            </div>
                                        </label>
                                        <textarea
                                                name="meta_description"
                                                value="{{old('meta_description',($postCatalogue->meta_description) ?? '')}} "
                                                class="form-control"
                                                autocomplete="off"
                                            ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">
                                            Đường dẫn
                                        </label>
                                        <div class="input-wrapper">
                                            <input
                                                type="text"
                                                name="canonical"
                                                value="{{old('canonical',($postCatalogue->canonical) ?? '')}} "
                                                class="form-control"
                                                autocomplete="off"
                                            >
                                            <span class="baseUrl">{{config('app.url')}}/</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
