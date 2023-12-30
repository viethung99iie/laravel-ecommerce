
@include('backend.user.component.breadcumb',['title'=>$config['seo']['index']['title']])
<div class="row mt20">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{$config['seo']['index']['table']}}</h5>
                    @include('backend.user.component.tool')
                </div>
                <div class="ibox-content">
                    @include('backend.user.component.filter')
                    @include('backend.user.component.table')
                </div>
            </div>
        </div>
</div>
