@extends("admin.layouts.index")
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit From Where</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route'=>['from-where-list.update',$from_where],'id'=>'form-data'] ) !!}
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade active show" id="english" role="tabpanel"
                                             aria-labelledby="english-tab">
                                            @include('admin.components.from_where_list.fields')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                            <button type="submit" class="btn btn-block btn-success" onclick="$('#form-data').submit()">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


