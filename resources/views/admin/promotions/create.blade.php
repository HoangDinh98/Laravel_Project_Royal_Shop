@extends ('layouts.admin')

@section('content')

<div id="page" class="dashboard">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-body">
                        <input type="hidden" id="promotion_id" name="promotion_id" value="">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Giá trị khuyến mãi (%)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="value" name="value">  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Mô tả khuyến mãi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            </div>
                                       <div class="form-group">
                                       <input type="hidden" id="page_return" name="page_return"
                                       value="">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="add_promotion_submit" name="add_promotion_submit" value="OK">
                            </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

