@extends("admin.layouts.index")
@section("title", title("Landing Page - " . ucfirst($type)))
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Landing Page ({{ucfirst($type)}})</h1>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Landing Page ({{ucfirst($type)}})</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route'=>['landing_page_data.update', $type],'id'=>'form-data', 'method'=>"PATCH"] ) !!}
                            <div class="row">
                                <div class="col-12">
                                    <h4>General Information</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('title','Title')}}
                                        {{form::text('title', $landingPageData->title,['class'=>'form-control','placeholder'=>'Enter landing page title'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('description','Description')}}
                                        {{form::textarea('description',$landingPageData->description,['class'=>'form-control', "style"=> "height: 38px;",'placeholder'=>'Enter landing page description'])}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Social links</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('facebook_pixel','Facebook pixel')}}
                                        {{form::textarea('facebook_pixel', $landingPageData->facebook_pixel,['class'=>'form-control','placeholder'=>'Enter landing page facebook pixel link'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('google_analytics','Google analytics')}}
                                        {{form::textarea('google_analytics', $landingPageData->google_analytics,['class'=>'form-control','placeholder'=>'Enter landing page Google analytics link'])}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Google Tag Manager</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('google_tag_manager_head','Google tag manager head')}}
                                        {{form::textarea('google_tag_manager_head', $landingPageData->google_tag_manager_head,['class'=>'form-control','placeholder'=>'Enter landing page Google tag manager head'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('google_tag_manager_body','Google tag manager body')}}
                                        {{form::textarea('google_tag_manager_body', $landingPageData->google_tag_manager_body,['class'=>'form-control','placeholder'=>'Enter landing page Google tag manager body'])}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Thanks Page Data</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('thanks_title','Thanks title')}}
                                        {{form::text('thanks_title', $landingPageData->thanks_title,['class'=>'form-control','placeholder'=>'Enter landing page Thanks title'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('thanks_paragraph','Thanks paragraph')}}
                                        {{form::textarea('thanks_paragraph',$landingPageData->thanks_paragraph,['class'=>'form-control','placeholder'=>'Enter landing page thanks paragraph'])}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Email Content</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('email_subject','Email subject')}}
                                        {{form::text('email_subject', $landingPageData->email_subject,['class'=>'form-control','placeholder'=>'Enter landing page Email subject'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('email_template','Email template')}}
                                        {{form::textarea('email_template',$landingPageData->email_template,['class'=>'form-control ckeditor','placeholder'=>'Enter landing page email template'])}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Seo Information</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('seo_title','Seo title')}}
                                        {{form::text('seo_title', $landingPageData->seo_title,['class'=>'form-control','placeholder'=>'Enter landing page Seo title'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('seo_description','Seo description')}}
                                        {{form::textarea('seo_description',$landingPageData->seo_description,['class'=>'form-control',"style"=> "height: 38px;",'placeholder'=>'Enter landing page Seo description'])}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ form::label('seo_keywords','Seo keywords')}}
                                        {{form::text('seo_keywords', $landingPageData->seo_keywords,['class'=>'form-control','placeholder'=>'Enter landing page Seo keywords'])}}
                                    </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                            <button type="submit" class="btn btn-success float-right m-3"
                                    onclick="$('#form-data').submit()">
                                Save Changes
                            </button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
