<div class="ibox">
                    <div class="ibox-content">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                    Chọn danh mục cha <span class="text-danger">(*)</span>
                                    </label>
                                    <span class="text-danger notice">*Chọn root nếu không có danh mục cha</span>
                                    <select name="parent_id" class="form-control setUpSelect2" id="">
                                        <option value="0">Chọn danh mục cha </option>
                                        <option value="1">Root </option>
                                        <option value="2">...</option>
                                    </select>
                                </div>
                                 @error('name')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Chọn ảnh đại diện</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <span class="image img-cover image-target">
                                        <img class="" src="{{asset('backend/img/no-img.jpg')}}" alt="">
                                    </span>
                                    <input type="hidden" name="image" value="">
                                </div>
                                 @error('image')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $publish = Request('publish')?:old('publish');
                @endphp
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cấu hình nâng cao</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="form-row mb15">
                                    <select name="publish" class="form-control setUpSelect2">
                                        @foreach (config('apps.general.publish') as $key => $val)
                                        <option @selected($publish===$key) value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row">
                                    <select name="publish" class="form-control setUpSelect2">
                                        @foreach (config('apps.general.follow') as $key => $val)
                                        <option @selected($publish===$key) value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 @error('image')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>
                </div>
